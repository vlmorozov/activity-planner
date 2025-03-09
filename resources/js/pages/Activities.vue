<script setup lang="ts">
import type { BreadcrumbItem, SharedData, User } from '@/types';
import { Head, usePage } from '@inertiajs/vue3';
import AppLayout from '@/layouts/AppLayout.vue';
import ManageActivities from '@/components/activities/ManageActivity.vue';

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Activity list',
        href: '/activity',
    },
];

interface Activity {
    id: number;
    title: string;
    description: string;
}

const props = defineProps<{ activities: Activity[] }>();

</script>

<template>
    <AppLayout :breadcrumbs="breadcrumbs">
        <Head title="Activity list" />

        <ManageActivities :activities="props.activities" />
    </AppLayout>
</template>

<style scoped>

</style>
