<template>
    <Head title="Signin" />
    <div class="card d-flex flex-row flex-column justify-content-center px-5 shadow-lg" style="width: 30rem; height: 30rem">
        <div class="d-flex flex-row align-items-center my-3 justify-content-center">
            <div class="me-3">
                <img src="/images/creative_digital.png" alt="Creative Digital" class="img-fluid" style="max-width: 100px;">
            </div>
            <div class="d-flex flex-column">
                <span class="fs-2">PPDB Online</span>
                <span>Silahkan login</span>
            </div>
        </div>
        <n-form
            ref="formRef"
            :model="model"
            :rules="rules"
            @submit.prevent="submit"
        >
            <n-form-item path="username" label="Username">
                <n-input v-model:value="model.username" @keydown.enter.prevent placeholder=""/>
            </n-form-item>
            <n-form-item path="password" label="Password">
                <n-input v-model:value="model.password" type="password" @keydown.enter.prevent show-password-on="mousedown" placeholder=""/>
            </n-form-item>
            <div class="my-3 d-flex flex-column">
                <n-button type="primary" attr-type="submit">login</n-button>
                <n-divider />
                <Link :href="route('register')" as="button" type="button" style="border-radius: 2px; background-color: #2080f0; color: white; border: none; padding: 7px; font-size: 14px; cursor: pointer;">
                    <span>Daftar disini!</span>
                </Link>
            </div>
        </n-form>
    </div>
</template>

<script lang="ts">
import { Head, useForm, usePage, Link } from '@inertiajs/vue3';
import GuestLayout from '../../Layouts/GuestLayout.vue';
import {defineComponent, ref} from 'vue';
import { FormInst, FormRules, useNotification } from 'naive-ui';
import Swal from 'sweetalert2';
import { UserLoginDTO } from '../../types/request.types';

export default defineComponent({
    setup() {
        const page = usePage();
        const notification = useNotification();
        
        const formRef = ref<FormInst | null>(null);
        const form = useForm<UserLoginDTO>({
            username: '',
            password: ''
        });

        const rules: FormRules = {
            username: { required: true, message: "Username is required", trigger: ['input', 'blur']},
            password: {required: true, message: "Password is required", trigger: ['input', 'blur']}
        }

        const submit = (e: MouseEvent) => {
            e.preventDefault();

            formRef.value?.validate().then(() => {
                form.post(route('login'), {
                    onError: (errors) => {
                        if (errors.username) {
                            Swal.fire({
                                icon: 'error',
                                title: 'Data tidak ada',
                                text: 'cek kembali akun anda'
                            })
                        }
                    },
                    onFinish: () => {
                        form.reset('password');

                        Swal.fire({
                            icon: 'success',
                            title: `Hello ${page.props.auth.user.fullname}`
                        });
                    }
                });
            });
        };

        return {
            model: form,
            formRef,
            page,
            notification,
            rules,
            submit
        }
    },
    layout: GuestLayout,
    components: {
        Link,
        Head
    }
});
</script>
