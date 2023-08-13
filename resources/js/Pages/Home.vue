<template>
    <Head title="Notas" />
    <Details :open="openDetails" @closeDetails="openDetails = false" :component="componentDetails"></Details>

    <div class="min-h-screen" v-if="!hasResult">
        <loading v-model:active="isLoading" :is-full-page="true" />

        <div class="grid h-screen place-items-center">
            <div class="flex flex-col">
                <div class="text-lg font-bold tracking-wide text-center mb-2">donut</div>
                <form @submit.prevent="getGrades(form)" class="w-48">
                    <input type="text" v-model="form.id" class="input-primary" placeholder="Carnet" v-maska="'##-#####-#'">
                    <input type="password" v-model="form.password" class="input-primary" placeholder="PIN">

                    <select v-model="form.year" class="select-primary appearance-none">
                        <option disabled selected :value="null">Selecciona un año</option>
                        <option v-for="year in years" :value="year" :key="year">{{ year }}</option>
                    </select>

                    <button class="btn-primary w-full" type="submit">Entrar</button>
                </form>

                <p class="text-center mt-4 text-slate-500" style="font-size: 0.7rem;">
                    Copyrigth 2023
                </p>
            </div>
        </div>
    </div>

    <div class="min-h-screen text-gray-800 mx-auto" style="width: 90%;" v-else>
        <div class="grid grid-cols-2 mb-4 gap-2 mx-auto lg:w-1/2">
            <button :class="['w-full', showGrades ? 'btn-primary' : 'btn-secondary']" @click="showGrades = true">
                Notas
            </button>
            <button :class="['w-full', showGrades ? 'btn-secondary' : 'btn-primary']" @click="showGrades = false">
                Información
            </button>
        </div>

        <div v-if="showGrades" class="lg:w-1/2 mx-auto">
            <template v-for="(cycle, index) in grades.cycles" :key="index">

                <HeaderCycle :title="cycle.name" />

                <template v-for="(component, index) in cycle.components" :key="index">
                    <CardComponent :component="component" @click="showDetails(component)" />
                </template>

            </template>
        </div>

        <div v-else class="lg:w-1/2 mx-auto">

            <HeaderCycle title="Datos del la universidad" />
            <SimpleCard>
                <div>{{ grades.university.full_name }}</div>
                <div>{{ grades.university.name }}</div>
                <div>{{ grades.university.academic_year }}</div>
                <div>{{ grades.university.faculty }}</div>
                <div>{{ grades.university.career }}</div>
            </SimpleCard>

            <HeaderCycle title="Datos del alumno" />
            <SimpleCard>
                <div>{{ grades.student.name }}</div>
                <div>{{ grades.student.id }}</div>
                <div>{{ grades.student.average }}</div>
                <div>{{ grades.student.grade }}</div>
            </SimpleCard>
        </div>
        <div class="lg:w-1/2 mx-auto">
            <button @click="resetValues()" type="button" class="btn-primary mb-8">
                Cerrar
            </button>
        </div>
    </div>
</template>

<script setup>
import { reactive, ref } from "vue"
import CardComponent from "@/Components/CardComponent.vue";
import SimpleCard from "@/Components/SimpleCard.vue";
import HeaderCycle from "@/Components/HeaderCycle.vue";
import Details from "@/Components/Details.vue";
import { Head } from "@inertiajs/vue3";
import { toast } from "@/Use/toast";
import axios from "axios";

const form = reactive({
    id: null,
    password: null,
    year: null
})

const isLoading = ref(false);
const showGrades = ref(true);
const openDetails = ref(false);
const componentDetails = ref([]);
const hasResult = ref(false);
const grades = ref([]);

const years = ref([]);

function initYears() {
    const currentYear = new Date().getFullYear();

    for (let i = 0; i < 10; i++) {
        years.value.push(currentYear - i);
    }
}

initYears();

async function getGrades(form) {

    if (!validateForm()) {
        return;
    }

    isLoading.value = true;

    try {
        const response = await axios.post(route('v1.grades'), form);
        grades.value = response.data;
        hasResult.value = true;
    } catch (e) {
        if (e.response.status == 401) {
            toast.error("Oops, algo no salio bien");
        } else {
            toast.error(Object.values(e.response.data.errors)[0].toString());
        }
    } finally {
        isLoading.value = false;
    }
}

function showDetails(data) {
    componentDetails.value = data
    openDetails.value = true
}

function resetValues() {
    form.password = null;
    hasResult.value = false;
    showGrades.value = true;
    openDetails.value = false;
    componentDetails.value = [];
}

function validateForm() {
    if (form.id == null || form.password == null || form.year == null) {
        toast.error("Debes llenar todos los campos");
        return false;
    }

    if (form.password.length < 6) {
        toast.error("El pin debe tener al menos 6 caracteres");
        return false;
    }

    if (!form.id.match(/^\d{2}-\d{5}-\d{1}$/)) {
        toast.error("El carnet no es valido");
        return false;
    }

    return true;
}

</script>