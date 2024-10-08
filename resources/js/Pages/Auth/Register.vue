<template>
    <Head title="Signup" /> 
    <div class="card d-flex flex-row flex-column justify-content-center px-5 shadow-lg my-4" style="width: 40rem; height: auto">
        <div class="d-flex flex-row align-items-center justify-content-center my-3">
            <div class="d-flex flex-column mb-2">
                <span class="fs-2">Registrasi data siswa</span>
                <span class="text-center">Isi sesuai dengan data siswa</span>
            </div>
        </div>
        <n-form
            ref="formRef"
            :model="model"
            :rules="rules"
            @submit.prevent="submit"
        >
            <n-form-item path="fullname" label="Fullname">
                <n-input v-model:value="model.fullname" @keydown.enter.prevent placeholder=""/>
            </n-form-item>
            <n-form-item path="email" label="Email">
                <n-input v-model:value="model.email" type="email" @keydown.enter.prevent placeholder=""/>
            </n-form-item>
            <n-form-item path="phone" label="Phone">
                <n-input v-model:value="model.phone" type="text" @keydown.enter.prevent placeholder=""/>
            </n-form-item>
            <n-form-item path="school_origin" label="School Origin">
                <n-input v-model:value="model.school_origin" type="text" @keydown.enter.prevent placeholder=""/>
            </n-form-item>
            <n-form-item path="gender" label="Gender">
                <n-select v-model:value="model.gender" :options="genderOptions" />
            </n-form-item>
            <div class="my-4 d-flex flex-column">
                <n-button type="primary" attr-type="submit">Register</n-button>
                <n-divider />
                <Link :href="route('login')" as="button" class="mb-3x" type="button" style="border-radius: 2px; background-color: #2080f0; color: white; border: none; padding: 7px; font-size: 14px; cursor: pointer;">
                    <span>Login disini!</span>
                </Link>
            </div>
        </n-form>
    </div>
</template>

<script lang="ts">
import GuestLayout from '../../Layouts/GuestLayout.vue';
import { defineComponent, ref } from 'vue'
import { usePage, Link, Head, useForm  } from '@inertiajs/vue3'
import { FormInst, FormRules, UploadFileInfo, useNotification } from 'naive-ui'
import Swal from 'sweetalert2';
import { StudentRegistrationDTO } from '../../types/request.types';

export default defineComponent({
    setup() {
        const page = usePage()
        const notification = useNotification()
        
        const formRef = ref<FormInst | null>(null)
        const form = useForm<StudentRegistrationDTO>({
            fullname: '',
            email: '',
            phone: '',
            school_origin: '',
            gender: ''
        })

        const uploadedFiles = ref<UploadFileInfo[]>([])

        const rules: FormRules = {
            fullname: { required: true, message: "Fullname is required", trigger: ['input', 'blur']},
            email: {required: true, message: "Email is required", trigger: ['input', 'blur']},
            phone: {required: true, message: "Phone is required", trigger: ['input', 'blur']},
            school_origin: {required: true, message: "School origin is required", trigger: ['input', 'blur']},
            gender: {required: true, message: "Gender is required", trigger: ['input','blur']}
        }

        const genderOptions = [
            {
                label: "Laki-laki",
                value: "MALE",
            },
            {
                label: "Perempuan",
                value: "FEMALE",
            }
        ];

        function submit(e: Event) {
            e.preventDefault()

            formRef.value?.validate().then(() => {
                form.post(route('register'), {
                    onError: (errors) => {
                            if(errors['email']) {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Validasi gagal',
                                    text: 'Email telah digunakan'
                                });
                            }
                    },
                    onSuccess: () => {
                        Swal.fire({
                            icon: 'success',
                            title: 'Registrasi siswa berhasil',
                            text: 'Data siswa telah terekam di data, mohon menunggu admin mengkonfirmasi akun anda dari email yang diberikan'
                        });
                    }
                })
            })
        }

        return {
            model: form,
            formRef,
            page,
            notification,
            rules,
            submit,
            uploadedFiles,
            genderOptions,
            onlyAllowNumber: (value: string) => !value || /^\d+$/.test(value),
        }
    },
    methods: {
        
    },
    components: {
        Head, Link
    },
    layout: GuestLayout
})
</script>
