<template>
    <div class="d-flex flex-row">
        <Link :href="route(toRouteName)">
            <n-button text color="#55679C">
                <template #icon>
                    <ArrowBack />
                </template>
                Back
            </n-button>
        </Link>
    </div>
</template>

<script lang="ts">
import { Link } from '@inertiajs/vue3';
import { defineComponent } from 'vue';
import { ArrowBack } from '@vicons/ionicons5'; 

export default defineComponent({
    name: "Back",
    props: {
        toRouteName: {
            type: String,
            required: true,
        }
    },
    components: {
        Link,
        ArrowBack
    }
})
</script>