<script setup lang="ts">
import { ref } from 'vue';
import ActivityItem from './ActivityItem.vue';
import ActivityForm from '@/components/activities/ActivityForm.vue';
import { router } from '@inertiajs/vue3';

interface Activity {
    id: number;
    title: string;
    description: string;
}

const props = defineProps<{ activities: Activity[] }>();
const activities = ref([...props.activities]);

const reloadActivities = () => {
    console.log(this);
    // activities.value = [...props.activities]; // Перерисовываем список
    router.reload({
        only: ['activities'],
        // headers: {
        //     'X-Custom-Header': 'value'
        // },
        onSuccess: (page) => {
            console.log('Reload successful', page);
            activities.value = [...page.props.activities];
        },
        onError: (errors) => {
            console.error('Reload failed', errors);
        },
        onFinish: () => {
            console.log('Reload finished');
        }
    });
};

</script>

<template>
    <div class="activity-list">
        <ActivityForm @created="reloadActivities" />
        <ActivityItem
            v-for="activity in activities"
            :key="activity.id"
            :activity="activity"
            @update="reloadActivities"
            @delete="reloadActivities"
        />
    </div>
</template>

<style scoped>
.activity-list {
    display: flex;
    flex-direction: column;
    gap: 10px;
}
</style>
