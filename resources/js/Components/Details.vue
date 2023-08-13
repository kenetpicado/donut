<template>
	<TransitionRoot as="template" :show="open">

		<Dialog as="div" class="relative z-10" @close="emit('closeDetails')">

			<TransitionChild as="template" enter="ease-out duration-300" enter-from="opacity-0" enter-to="opacity-100"
				leave="ease-in duration-200" leave-from="opacity-100" leave-to="opacity-0">
				<div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
			</TransitionChild>

			<div class="fixed inset-0 z-10 overflow-y-auto">
				<div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0" w-full>
					<TransitionChild as="template" enter="ease-out duration-300"
						enter-from="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
						enter-to="opacity-100 translate-y-0 sm:scale-100" leave="ease-in duration-200"
						leave-from="opacity-100 translate-y-0 sm:scale-100"
						leave-to="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95">
						<DialogPanel
							class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all w-full sm:max-w-lg">
							<div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
								<div class="sm:flex sm:items-start">
									<div class="mt-2 sm:mt-0 sm:ml-4 sm:text-left">
										<DialogTitle as="h3" class="text-lg font-bold">
											{{ component.name }}
										</DialogTitle>
										<div class="mt-4 space-y-4">
											<div v-if="component.partial_1">
												Parcial I: {{ component.partial_1 }}
											</div>
											<div v-if="component.partial_2">
												Parcial II: {{ component.partial_2 }}
											</div>
											<div v-if="component.partial_3">
												Parcial III: {{ component.partial_3 }}
											</div>
											<div v-if="component.final" class="font-bold">
												Nota final: {{ component.final }}
											</div>
											<div v-if="component.second_call">
												Segunda convocatoria: {{ component.second_call }}
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="flex justify-center">
								<button type="button" class="btn-primary" @click="emit('closeDetails')">
									Cerrar
								</button>
							</div>
						</DialogPanel>
					</TransitionChild>
				</div>
			</div>
		</Dialog>
	</TransitionRoot>
</template>

<script setup>
import { Dialog, DialogPanel, DialogTitle, TransitionChild, TransitionRoot } from '@headlessui/vue'

const emit = defineEmits(['closeDetails'])

defineProps({
	open: Boolean,
	component: Object
})

</script>