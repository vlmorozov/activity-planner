<script setup lang="ts">
import { Activity } from '@/types/activity';
import ActivityGroupList from '@/components/activities/groups/ActivityGroupList.vue';

const props = defineProps<{ activity: Activity }>();

</script>

<template>
    <div class="activity-view">
        <h3>{{ props.activity.name }}</h3>
        <p>{{ props.activity.description }}</p>
    </div>

    <ActivityGroupList
        v-if="props.activity.activityGroups.length"
        :activity-groups="props.activity.activityGroups"
    />
</template>

<style scoped>

</style>
