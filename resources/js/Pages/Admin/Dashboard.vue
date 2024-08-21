<template>
    <Head title="Admin dashboard" />
    <AppLayout>
        <div class="d-flex flex-column gap-3">
            <div class="card" style="background-color: #7C93C3;">
                <div class="card-body h-75 d-flex flex-row align-items-center">
                    <n-image width="300" src="/images/greetings-admin-1.png" preview-disabled />
                    <div class="d-flex flex-column">
                        <span class="fs-3 fw-medium text-white">
                            Hello {{ user.fullname }}, let's get work
                        </span>
                        <span class="fs-5 text-white">
                            Let's give your best effort in everything you do today!
                        </span>
                    </div>
                </div>
            </div>
            <n-flex justify="space-between">
                <CardCount v-for="(data, index) in dataCount" :key="index" :title="data.title" :count="data.count"
                    :subTitle="data.subTitle" :bgColor="data.bgColor" />
            </n-flex>
            <div class="card">
                <div class="card-body d-flex flex-column">
                    <div class="fs-6 fw-medium mb-4 d-flex flex-row align-items-center">
                        <span>New student registered today</span>
                        <Link class="ms-auto" :href="route('register')" as="button" type="button" style="width: 150px; border-radius: 2px; background-color: #2080f0; color: white; border: none; padding: 7px; font-size: 14px; cursor: pointer;">
                            <span>View all data</span>
                        </Link>
                    </div>
                    <n-data-table
                        :columns="columns"
                        :data="data"
                        :pagination="pagination"
                        :bordered="false"
                    />
                </div>
            </div>
        </div>
    </AppLayout>
</template>

<script lang="ts">
import { usePage, Head, Link } from "@inertiajs/vue3";
import { defineComponent, h } from 'vue';
import AppLayout from "../../Layouts/AppLayout.vue";
import CardCount from "../../Components/CardCount.vue";
import { DataTableColumns, NAvatar, NButton, useMessage } from "naive-ui";
import { CubeOutline } from '@vicons/ionicons5';

interface Student {
    profile: string;
    student_name: string;
    batch_choosen: string;
    batch_number: string;
    registered_at: string;
}

function createColumns(): DataTableColumns<Student> {
    return [
        {
            title: 'Profile',
            key: 'profile',
            render(row) {
                return h(NAvatar, {
                    src: row.profile,
                    size: 50,
                    round: true,
                    previewSrc: row.profile // Enables the preview when clicked
                });
            }
        },
        {
            title: 'Student name',
            key: 'student_name'
        },
        {
            title: 'Batch choosen',
            key: 'batch_choosen'
        },
        {
            title: 'Batch number',
            key: 'batch_number'
        },
        {
            title: 'Registered at',
            key: 'registered_at'
        }
    ];
}

export default defineComponent({
    setup() {
        const page = usePage();
        const user = page.props.auth.user;
        const message = useMessage();

        const dataCount = [
            { title: "Waiting to approved", subTitle: "Payment", count: 10, bgColor: '#f2c97d' },
            { title: "Waiting to accept", subTitle: "Registering student", count: 10 },
            { title: "Registered Student", subTitle: "Student", count: 10, bgColor: '#63e2b7' },
        ];

        // Example data with profile image URLs
        const data: Student[] = [
            { profile: '/images/foto_formal.jpeg', student_name: 'John Doe', batch_choosen: 'Batch A',batch_number: "1", registered_at: '2024-08-20' },
            { profile: '/images/foto_formal.jpeg', student_name: 'Jane Smith', batch_choosen: 'Batch B',batch_number: "1", registered_at: '2024-08-21' },
            { profile: '/images/foto_formal.jpeg', student_name: 'John Doe', batch_choosen: 'Batch A',batch_number: "1", registered_at: '2024-08-20' },
            { profile: '/images/foto_formal.jpeg', student_name: 'Jane Smith', batch_choosen: 'Batch B',batch_number: "1", registered_at: '2024-08-21' },
            { profile: '/images/foto_formal.jpeg', student_name: 'John Doe', batch_choosen: 'Batch A',batch_number: "1", registered_at: '2024-08-20' },
            { profile: '/images/foto_formal.jpeg', student_name: 'Jane Smith', batch_choosen: 'Batch B',batch_number: "1", registered_at: '2024-08-21' },
            { profile: '/images/foto_formal.jpeg', student_name: 'John Doe', batch_choosen: 'Batch A',batch_number: "1", registered_at: '2024-08-20' },
            { profile: '/images/foto_formal.jpeg', student_name: 'Jane Smith', batch_choosen: 'Batch B',batch_number: "1", registered_at: '2024-08-21' },
            { profile: '/images/foto_formal.jpeg', student_name: 'John Doe', batch_choosen: 'Batch A',batch_number: "1", registered_at: '2024-08-20' },
            { profile: '/images/foto_formal.jpeg', student_name: 'Jane Smith', batch_choosen: 'Batch B',batch_number: "1", registered_at: '2024-08-21' },
            // Add more student data here...
        ];

        return {
            user,
            dataCount,
            data,
            columns: createColumns(),
            pagination: false as const
        };
    },
    components: {
        CardCount,
        CubeOutline,
        Head,
        Link
    }
});
</script>
