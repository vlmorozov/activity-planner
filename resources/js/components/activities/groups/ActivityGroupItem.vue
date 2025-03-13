<script setup lang="ts">
import { ActivityGroup } from '@/types/activity';
import { ref } from 'vue';
import { useForm } from '@inertiajs/vue3';

const props = defineProps<{ activity_group: ActivityGroup }>();
const emit = defineEmits(['update', 'delete']);

const isEditing = ref(false);
const form = useForm({
    name: props.activity_group.name
});

const saveEdit = () => {
    form.put(route('activity_group.update', [props.activity_group.id]), {
        onSuccess: () => {
            isEditing.value = false;
            emit('update');
        }
    });
};

const deleteActivityGroup = () => {
    if (!confirm('Удалить?')) return;
    form.delete(route('activity_group.destroy', [props.activity_group.id]), {
        onSuccess: () => emit('delete')
    });
};
</script>

<template>
    <div class="activity-item">
        <template v-if="isEditing">
            <input v-model="form.name" class="input" />
            <button @click="saveEdit">💾 Сохранить</button>
            <button @click="isEditing = false">❌ Отмена</button>
        </template>
        <template v-else>
            <h3>{{ activity_group.name }}</h3>
            <div class="actions">
                <button @click="isEditing = true">✏️ Редактировать</button>
                <button @click="deleteActivityGroup">🗑 Удалить</button>
            </div>
        </template>
    </div>
</template>

<style scoped>

</style>
