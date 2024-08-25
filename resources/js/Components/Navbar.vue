<template>
    <nav class="d-flex w-100 align-items-center" style="height: 70px; background-color: #55679C;">
        <div class="mx-5 d-flex align-items-center w-100">
            <img src="/images/creative_digital.png" alt="" class="img-fluid" style="max-height: 70px;">
            <div class="fw-bold fs-5 text-white">
                PPDB Online Management
            </div>
            <div class="d-flex flex-row ms-auto">
                <n-dropdown trigger="click" :options="dropdownOptions" @select="handleSelect">
                    <AccountProfile :adminName="fullname" :isAdmin="isAdmin" />
                </n-dropdown>
            </div>
        </div>
    </nav>
</template>

<script lang="ts">
import { defineComponent, h } from 'vue';
import type { Component } from 'vue';
import AccountProfile from './AccountProfile.vue';
import { NIcon } from 'naive-ui';
import {
  Pencil as EditIcon,
  LogOutOutline as LogoutIcon,
  PersonCircleOutline as UserIcon
} from '@vicons/ionicons5'
import { useForm } from '@inertiajs/vue3';
import Swal from 'sweetalert2';

function renderIcon(icon: Component) {
    return () => {
        return h(NIcon, null, {
            default: () => h(icon)
        });
    }
}

export default defineComponent({
    name: "Navbar",
    setup() {
        const form = useForm({});
        const dropdownOptions = [
            {
                label: 'Logout',
                key: 'logout',
                icon: renderIcon(LogoutIcon)
            }
        ];

        const handleSelect = (key: string) => {
            if(key === 'logout') {
                form.post(route('logout'), {
                    onFinish: () => {
                        Swal.fire({
                            icon: 'success',
                            title: 'Success logout',
                        })
                    }
                });
            }
        }

        return {
            dropdownOptions,
            handleSelect
        }
    },
    components: {
        AccountProfile
    },
    props: {
        fullname: {
            type: String,
            required: true
        },
        isAdmin: {
            type: Boolean,
            required: true,
        }
    }
})
</script>