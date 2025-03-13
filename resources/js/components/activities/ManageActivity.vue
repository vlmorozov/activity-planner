<script setup lang="ts">
import { ref } from 'vue';
import ActivityList from './ActivityList.vue';
import { Activity } from '@/types/activity';

const props = defineProps<{ activities: Activity[] }>();
const activities = ref([...props.activities]);
</script>

<template>
    <ActivityList :activities="activities" />
</template>

<style scoped>

</style>
