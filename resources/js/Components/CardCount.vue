<template>
    <div class="card" style="width: 380px;">
        <div class="card-body">
            <n-flex>
                <div class="card " :style="{
                    width: '5px',
                    border: 'none',
                    backgroundColor: bgColor
                }" />
                <n-flex vertical>
                    <span class="fs-4 fw-semibold d-flex flex-column">
                        {{ title }}
                        <span class="fs-6 fw-normal">
                            {{ subTitle }}
                        </span>
                    </span>
                    <span class="fs-2 fw-bold">
                        {{ count }}
                    </span>
                </n-flex>
            </n-flex>
        </div>
    </div>
</template>

<script lang="ts">
import { defineComponent } from 'vue';

export default defineComponent({
    name: "CardCount",
    props: {
        title: {
            type: String,
            required: true,
        },
        subTitle: {
            type: String,
            required: false,
        },
        count: {
            type: Number,
            required: true
        },
        bgColor: {
            type: String,
            required: false,
            default: "#7C93C3"
        }
    }
});
</script>