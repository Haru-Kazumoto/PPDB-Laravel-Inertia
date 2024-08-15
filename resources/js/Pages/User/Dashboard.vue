<template>
    <div>
        User dashboard
        <p>Authenticated as {{ user.name }}</p>
    </div>
</template>

<script setup lang="ts">
import { usePage } from '@inertiajs/vue3';

const page = usePage();
const user = computed(() => page.props.auth.user);
</script>

<style scoped>

</style>