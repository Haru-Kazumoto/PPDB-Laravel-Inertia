<template>
    <Head title="Signup" /> 
    <div class="card d-flex flex-row flex-column justify-content-center px-5 shadow-lg my-4" style="width: 40rem; height: auto">
        <div class="d-flex flex-row align-items-center justify-content-center my-3">
            <div class="d-flex flex-column mb-2">
                <span class="fs-2">Registrasi admin baru</span>
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
            <n-form-item path="username" label="Username">
                <n-input v-model:value="model.username" type="text" @keydown.enter.prevent placeholder=""/>
            </n-form-item>
            <n-form-item path="password" label="Password">
                <n-input v-model:value="model.password" type="password" show-password-on="mousedown" @keydown.enter.prevent placeholder=""/>
            </n-form-item>
            <n-form-item path="email" label="Email">
                <n-input v-model:value="model.email" type="email" @keydown.enter.prevent placeholder=""/>
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
import GuestLayout from '@/Layouts/GuestLayout.vue';
import { defineComponent, ref } from 'vue'
import { usePage, Link, Head, useForm  } from '@inertiajs/vue3'
import { FormInst, FormRules, UploadFileInfo, useNotification } from 'naive-ui'
import Swal from 'sweetalert2';
import { AdminRegistrationDTO } from '../../types/request.types';

export default defineComponent({
    setup() {
        const page = usePage()
        const notification = useNotification()
        
        const formRef = ref<FormInst | null>(null)
        const form = useForm<AdminRegistrationDTO>({
            fullname: '',
            username: '',
            email: '',
            password: ''
        });

        const uploadedFiles = ref<UploadFileInfo[]>([]);

        const rules: FormRules = {
            fullname: { required: true, message: "Fullname is required", trigger: ['input', 'blur']},
            username: {required: true, message: "Username is required", trigger: ['input', 'blur']},
            email: {required: true, message: "Email is required", trigger: ['input', 'blur']},
            password: {required: true, message: "Password is required", trigger: ['input', 'blur']},
        }

        function submit(e: Event) {
            e.preventDefault()

            formRef.value?.validate().then(() => {
                form.post(route('register.admin'), {
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
                            title: 'Registrasi admin berhasil',
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
            onlyAllowNumber: (value: string) => !value || /^\d+$/.test(value),
        };
    },
    components: {
        Head, Link
    },
    layout: GuestLayout
})
</script>
