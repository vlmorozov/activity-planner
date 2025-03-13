<script setup lang="ts">

import { useForm } from '@inertiajs/vue3';
import { Input } from '@/components/ui/input';
import { Label } from '@/components/ui/label';
import { Button } from '@/components/ui/button';
import { TransitionRoot } from '@headlessui/vue';
import InputError from '@/components/InputError.vue';

const form = useForm({
    name: '',
    description: '',
});

const emit = defineEmits(['created']);

const submit = () => {
    form.post(route('activity.create'), {
        preserveScroll: true,
        onSuccess: () => {
            form.reset();
            emit('created');
        },
    });
};

</script>

<template>
    <div class="px-4 py-6">
        <form @submit.prevent="submit" class="space-y-6">
            <div class="grid gap-2">
                <Label for="activity-name">Name</Label>
                <Input id="activity-name" class="mt-1 block w-full" v-model="form.name" required autocomplete="name" placeholder="Name" />
                <InputError class="mt-2" :message="form.errors.name" />
            </div>

            <div class="grid gap-2">
                <Label for="activity-description">Description</Label>
                <Input
                    id="activity-description"
                    class="mt-1 block w-full"
                    v-model="form.description"
                    autocomplete="description"
                    placeholder="Description"
                />
                <InputError class="mt-2" :message="form.errors.description" />
            </div>

            <div class="flex items-center gap-4">
                <Button :disabled="form.processing">Save</Button>

                <TransitionRoot
                    :show="form.recentlySuccessful"
                    enter="transition ease-in-out"
                    enter-from="opacity-0"
                    leave="transition ease-in-out"
                    leave-to="opacity-0"
                >
                    <p class="text-sm text-neutral-600">Saved.</p>
                </TransitionRoot>
            </div>
        </form>
    </div>
</template>

<style scoped>

</style>
