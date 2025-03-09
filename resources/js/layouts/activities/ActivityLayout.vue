<script setup lang="ts">
import Heading from '@/components/Heading.vue';
import { Button } from '@/components/ui/button';
import ActivityList from '@/components/activities/ManageActivity.vue';
</script>

<template>
    <div class="px-4 py-6">
        <Heading title="Activities" description="Manage your activities" />

        <div class="flex flex-col space-y-8 md:space-y-0 lg:flex-row lg:space-x-12 lg:space-y-0">

            <ActivityList />

        </div>
    </div>
</template>
