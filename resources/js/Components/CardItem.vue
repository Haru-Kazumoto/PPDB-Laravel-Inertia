<template>
    <div class="card shadow-sm"  style="height: 100px">
        <div class="card-body d-flex">
            <div class="d-flex flex-row align-items-center gap-4 w-100">
                <div class="card" style="background-color: #7C93C3; border: none">
                    <div class="card-body ">
                        <n-icon class="fs-2 d-flex align-items-center text-white">
                            <Create />
                        </n-icon>
                    </div>
                </div>
                <div class="d-flex flex-column gap-2">
                    <span class="fw-semibold fs-4">{{ path_name }}</span>
                    <div class="d-flex flex-row align-items-center gap-2">
                        <n-icon >
                            <FileTrayFullOutline />
                        </n-icon>
                        <span >Batch registered : 2</span> | 
                        <n-icon>
                            <FileTrayFullOutline />
                        </n-icon>
                        <span>Path type : {{ path_type }}</span>
                    </div>
                </div>
                <div class="d-flex flex-row ms-auto">
                    <Link :href="route('registration-path.show', path_id)">
                        <n-button color="#55679C">
                            <template #icon>
                                <OpenOutline />
                            </template>
                            View
                        </n-button>
                    </Link>
                </div>
            </div>
        </div>
    </div>
</template>

<script lang="ts">
import { defineComponent } from 'vue'
import {Create, FileTrayFullOutline, OpenOutline} from "@vicons/ionicons5";
import { Link } from '@inertiajs/vue3';

export default defineComponent({
    name: "CardItem",
    props: {
        path_id: {
            type: Number,
            required: true
        },
        path_type: {
            type: String,
            required: true
        },
        path_name: {
            type: String,
            required: true,
        }
    },
    components: {
        Create,
        FileTrayFullOutline,
        Link,
        OpenOutline
    }
})
</script>

<style scoped></style>