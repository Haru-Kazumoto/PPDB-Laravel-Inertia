<template>
    <div class="d-flex flex-row gap-2 align-items-center" style="cursor: pointer;">
        <n-avatar 
            round
            size="medium"
            src="/images/creative_digital.png"
            :style="{
                backgroundColor: 'white'
            }"
        />
        <div class="d-flex flex-column">
            <span class="fw-bold text-white" style="font-size: 15px;">{{ adminName }}</span>
            <span class="text-white" style="font-size: 13px;">{{ isAdmin ? "Admin" : "Student" }}</span>
        </div>
    </div>
</template>

<script lang="ts">
import {defineComponent} from 'vue';

export default defineComponent({
    props: {
        adminName: {
            type: String,
            required: true,
        },
        isAdmin: {
            type: Boolean,
            required: true,
            default: true
        }
    }
})
</script>