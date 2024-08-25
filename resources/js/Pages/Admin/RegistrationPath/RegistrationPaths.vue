<template>

    <Head title="Registration path" />
    <AppLayout>
        <div class="d-flex flex-column" style="gap: 60px;">
            <div class="card">
                <div class="card-body d-flex">
                    <div class="card " :style="{
                        width: '5px',
                        border: 'none',
                        backgroundColor: '#7C93C3',
                        marginRight: '10px'
                    }" />
                    <span class="fs-4 fw-semibold">Registration Path</span>
                </div>
            </div>
            <div class="d-flex flex-column gap-3">
                <div v-if="flash && flash.success" class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ flash.success }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" />
                </div>
                <div class="d-flex flex-row gap-3">
                    <n-input placeholder="Search registration path" class="w-25">
                        <template #prefix>
                            <n-icon>
                                <SearchOutline />
                            </n-icon>
                        </template>
                    </n-input>
                    <Link :href="route('registration-path.create')">
                    <n-button color="#55679C">
                        <template #icon>
                            <n-icon>
                                <AddOutline />
                            </n-icon>
                        </template>
                        Add new registration path
                    </n-button>
                    </Link>
                </div>
                <div class="card">
                    <div class="card-body d-flex flex-column gap-3" >
                        <div v-if="!registrationPathData?.length"
                            class="d-flex flex-column align-items-center justify-content-center h-100">
                            <n-image width="300" src="/images/empty.png" preview-disabled />
                            <p class="text-body-secondary">Data empty, let's create new path!</p>
                        </div>
                        <div 
                            v-else 
                            v-for="(path, index) in registrationPathData" 
                            :key="index"
                        >
                            <CardItem
                                :path_id="path.id"
                                :path_name="path.path_name"
                                :path_type="path.path_type"
                            />
                        </div>
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
import { RegistrationPath } from '../../../types';
import { SearchOutline, AddOutline } from '@vicons/ionicons5';
import CardItem from '@/Components/CardItem.vue';

export default defineComponent({
    setup() {
        const page = usePage();

        const flash = page.props.flash;
        const registrationPathData = page.props.pathData as RegistrationPath[];

        return {
            flash,
            registrationPathData
        }
    },
    components: {
        Head,
        Link,
        SearchOutline,
        AddOutline,
        CardItem
    },
})
</script>

<style scoped></style>