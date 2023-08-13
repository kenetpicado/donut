<template>
	<div class="bg-white my-4 p-3 rounded-xl transition select-none duration-300 transform active:scale-110">
		<div class="flex justify-between items-center">
			<div>
				<div class="font-semibold tracking-wide mb-1 text-base">
					{{ component.name }}
				</div>
				<div v-if="isQualitative" class="text-xs text-lime-700">
					{{ component.final }}
				</div>
				<div v-else :class="[' text-xs', isApproved ? 'text-lime-700' : 'text-red-600']">
					{{ isApproved ? 'Aprobado' : 'Reprobado' }}
				</div>
			</div>
			<div v-if="!isQualitative" :class="['font-semibold text-xl ml-2', isApproved ? '' : 'text-red-600']">
				<label>{{ component.final }}</label>
			</div>
		</div>
	</div>
</template>

<script setup>

const props = defineProps({
	component: {
		type: Object,
		required: true
	}
})

const isApproved = props.component.final >= 60;

const isQualitative = props.component.name.includes('ACTIVIDAD ESTUDIANTIL');

</script>