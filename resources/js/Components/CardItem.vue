<template>
    <div class="card shadow-sm">
        <div class="card-body">
            
        </div>
    </div>
</template>

<script lang="ts">
import { defineComponent } from 'vue'
import { RegistrationPath } from '../types/data.types';

export default defineComponent({
    setup () {
        

        return {}
    },
    props: {
        registrationPathData: {
            type: Array as () => RegistrationPath[],
            required: false
        }
    }
})
</script>

<style scoped>

</style>