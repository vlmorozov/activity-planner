<script setup lang="ts">
import { ref } from 'vue';
import ActivityList from './ActivityList.vue';

interface Activity {
    id: number;
    title: string;
    description: string;
}

const props = defineProps<{ activities: Activity[] }>();
const activities = ref([...props.activities]);
</script>

<template>
    <ActivityList :activities="activities" />
</template>

<style scoped>

</style>
