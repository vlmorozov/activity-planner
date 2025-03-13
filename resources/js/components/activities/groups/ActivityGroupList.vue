<script setup lang="ts">
import { Activity, ActivityGroup } from '@/types/activity';
import ActivityGroupItem from '@/components/activities/groups/ActivityGroupItem.vue';
import { ref } from 'vue';
import { router } from '@inertiajs/vue3';

const props = defineProps<{ activity_groups: ActivityGroup[] }>();
const activities = ref([...props.activity_groups]);

const reloadActivities = () => {
    router.reload({
        only: ['activity_groups'],
        onSuccess: (page) => {
            console.log('Reload successful', page);
            activities.value = [...page.props.activity_groups];
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
        <ActvityGroupForm @created="reloadActivities" />
        <ActivityGroupItem
            v-for="activity_group in activity_groups"
            :key="activity_group.id"
            :activity_group="activity_group"
            @update="reloadActivities"
            @delete="reloadActivities"
        />
    </div>
</template>

<style scoped>

</style>
