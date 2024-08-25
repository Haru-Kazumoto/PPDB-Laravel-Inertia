<template>

    <Head title="Registration path"></Head>
    <Back toRouteName="registration-path.index" />
    <div class="card shadow-sm my-3">
        <div class="card-body d-flex">
            <div class="d-flex flex-row align-items-center gap-4 w-100">
                <div class="card" style="background-color: #7C93C3; border: none">
                    <div class="card-body ">
                        <n-icon class="fs-2 d-flex align-items-center text-white">
                            <Create />
                        </n-icon>
                    </div>
                </div>
                <span class="fw-semibold fs-4">{{ registrationPath.path_name }}</span>
            </div>
        </div>
        <div class="d-flex flex-column gap-2 px-3">
            <div class="d-flex flex-column gap-2 mb-3">
                <div class="d-flex flex-row align-items-center gap-3">
                    <n-icon>
                        <FileTrayFullOutline />
                    </n-icon>
                    <span>Batch registered : 2</span>
                </div>
                <div class="d-flex flex-row align-items-center gap-3">
                    <n-icon>
                        <BriefcaseOutline />
                    </n-icon>
                    <span>Path type :
                        <n-tag :bordered="false"
                            :type="registrationPath.path_type === 'PURCHASING' ? 'success' : 'warning'">
                            {{ registrationPath.path_type }}
                        </n-tag>
                    </span>
                </div>
                <div class="d-flex flex-row align-items-center gap-3">
                    <n-icon>
                        <TimeOutline />
                    </n-icon>
                    <span>Created at : Tuesday</span>
                </div>
            </div>
            <div class="w-100 border mb-4" />
            <div class="d-flex flex-column gap-4 mb-3">
                <div class="d-flex flex-row">
                    <strong class="fs-5">Registration Batches</strong>
                    <n-button class="d-flex flex-row ms-auto" type="primary" @click="openModal = true">Create new
                        batch</n-button>
                    <n-modal v-model:show="openModal">
                        <n-card style="width: 600px" title="Modal" :bordered="false" size="huge" role="dialog"
                            aria-modal="true">
                            <template #header-extra>
                                Oops!
                            </template>
                            Content
                            <template #footer>
                                Footer
                            </template>
                        </n-card>
                    </n-modal>
                </div>
                <!-- List of registration batches -->
                <div class="card shadow-sm" style="height: 100px"
                    v-for="(registrationBatch, index) in registrationPath.registration_batches" :key="index">
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
                                <span class="fw-semibold fs-4">{{ registrationBatch.batch_name }}</span>
                                <div class="d-flex flex-row align-items-center gap-2">
                                    <n-icon>
                                        <FileTrayFullOutline />
                                    </n-icon>
                                    <span>Registration path : {{ registrationBatch.batch_name }} </span> |
                                    <n-icon>
                                        <FileTrayFullOutline />
                                    </n-icon>
                                    <span>Path type : {{ registrationBatch.batch_name }}</span>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- <div class="d-flex flex-column gap-3 my-3">
        <div class="card">
            <div class="card-body">
                <h3>{{ registrationPath.path_name }}</h3>
                <p>Path Type: {{ registrationPath.path_type }}</p>
                <h4>Registration Batches</h4>
                <ul>
                    <li v-for="batch in registrationPath.registration_batches" :key="batch.id">
                        {{ batch.name }} - {{ batch.created_at }}
                    </li>
                </ul>
            </div>
        </div>
    </div> -->
</template>

<script lang="ts">
import { Head, Link, usePage } from '@inertiajs/vue3';
import { defineComponent, ref } from 'vue'
import { Create, FileTrayFullOutline, OpenOutline, BriefcaseOutline, TimeOutline } from "@vicons/ionicons5";
import Back from '@/Components/Back.vue';

export default defineComponent({
    setup() {
        const page = usePage();
        const registrationPath = page.props.dataShow;

        const openModal = ref(false);

        function handleOpenModal() {
            openModal.value = true;
        }

        return {
            registrationPath,
            openModal,
            handleOpenModal
        }
    },
    components: {
        Back,
        Head,
        Link,
        Create,
        FileTrayFullOutline,
        OpenOutline,
        BriefcaseOutline,
        TimeOutline
    }
})
</script>

<style scoped></style>