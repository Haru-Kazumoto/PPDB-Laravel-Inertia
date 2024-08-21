<template>
    <Head title="Registration path"/>
    <AppLayout>
        <div class="d-flex flex-column" style="gap: 100px;">
            <div class="card">
                <div class="card-body d-flex">
                    <div 
                        class="card " 
                        :style="{
                            width: '5px',
                            border: 'none', 
                            backgroundColor: '#7C93C3',
                            marginRight: '10px'
                        }"
                    />
                    <span class="fs-4 fw-semibold">Registration Path</span>
                </div>
            </div>
            <div class="d-flex flex-column gap-3">
                <div class="d-flex flex-row gap-3">
                    <n-input placeholder="Search registration path" class="w-25">
                        <template #prefix>
                            <n-icon>
                                <SearchOutline />
                            </n-icon>
                        </template>
                    </n-input>
                    <Link :href="route('dashboard.admin')">
                        <n-button color="#55679C">
                            <template #icon>
                                <n-icon><AddOutline /></n-icon>
                            </template>
                            Add new registration path
                        </n-button>
                    </Link>
                </div>
                <div class="card">
                    <div class="card-body" style="height: 500px;">
                        <CardItem />
                    </div>
                    <div v-if="!registrationPathData?.length" class="d-flex flex-column align-items-center justify-content-center">
                        <n-image 
                            width="500"
                            src="/images/empty.png"
                            preview-disabled
                        />
                        <p>Data kosong</p>
                    </div>
                    <!-- Kondisi ketika data kosong -->
                    <!-- Kondisi ketika data ada -->
                    <div v-else>
                        <!-- Tampilkan data dari props array -->
                        <ul>
                            <li v-for="(path, index) in registrationPathData" :key="index">
                                {{ path.path_name }}
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>

<script lang="ts">
import { defineComponent } from 'vue';
import { Head, Link, usePage } from '@inertiajs/vue3';
import AppLayout from '@/Layouts/AppLayout.vue';
import { RegistrationPath } from '../../types';
import { SearchOutline, AddOutline } from '@vicons/ionicons5';
import CardItem from '../../Components/CardItem.vue';

export default defineComponent({
    setup () {
        const page = usePage();
        const registrationPathData = page.props.pathData as RegistrationPath[];

        return {
            registrationPathData
        }
    },
    components: {
        Head, 
        Link,
        SearchOutline,
        AddOutline,
        CardItem
    }
})
</script>

<style scoped>

</style>