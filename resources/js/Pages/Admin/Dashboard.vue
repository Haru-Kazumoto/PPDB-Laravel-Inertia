<template>
    <div>
        <h1>helo {{ user.name }}</h1>
        <div class="d-flex flex-column">
            <span>{{ num }}</span>
            <n-button @click="increase" type="info" class="w-25">Increase</n-button>
        </div>
    </div>
</template>

<script setup lang="ts">
import { usePage } from '@inertiajs/vue3';
import {ref, computed} from 'vue';

const page = usePage();
const num = ref(0);

function increase(){
    return num.value += 1;
}

const user = computed(() => page.props.auth.user);

defineProps({
    name: String
});
</script>