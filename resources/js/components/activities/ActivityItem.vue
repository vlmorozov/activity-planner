<script setup lang="ts">
import { useForm } from '@inertiajs/vue3';
import { ref } from 'vue';

interface Activity {
    id: number;
    name: string;
    description: string;
}

const props = defineProps<{ activity: Activity }>();
const emit = defineEmits(['update', 'delete']);

const isEditing = ref(false);
const form = useForm({
    name: props.activity.name,
    description: props.activity.description
});

const saveEdit = () => {
    form.put(route('activity.update', props.activity.id), {
        onSuccess: () => {
            isEditing.value = false;
            emit('update');
        }
    });
};

const deleteActivity = () => {
    if (!confirm('Удалить?')) return;
    form.delete(route('activity.destroy', props.activity.id), {
        onSuccess: () => emit('delete')
    });
};
</script>

<template>
    <div class="activity-item">
        <template v-if="isEditing">
            <input v-model="form.name" class="input" />
            <textarea v-model="form.description" class="input"></textarea>
            <button @click="saveEdit">💾 Сохранить</button>
            <button @click="isEditing = false">❌ Отмена</button>
        </template>
        <template v-else>
            <h3>{{ activity.name }}</h3>
            <p>{{ activity.description }}</p>
            <div class="actions">
                <button @click="isEditing = true">✏️ Редактировать</button>
                <button @click="deleteActivity">🗑 Удалить</button>
            </div>
        </template>
    </div>
</template>

<style scoped>
.activity-item {
    padding: 10px;
    border: 1px solid #ddd;
    border-radius: 5px;
    margin-bottom: 10px;
}
.input {
    width: 100%;
    margin-bottom: 5px;
}
.actions {
    margin-top: 10px;
}
</style>
