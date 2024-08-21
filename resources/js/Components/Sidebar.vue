<template>
    <n-layout-sider bordered collapse-mode="width" :collapsed-width="64" :width="270" :collapsed="collapsed"
        @collapse="collapsed = true" @expand="collapsed = false">
        <n-menu 
            :collapsed="collapsed" 
            :collapsed-width="64" 
            :collapsed-icon-size="22" 
            :options="menuOptions"
            :render-label="renderMenuLabel" 
            :render-icon="renderMenuIcon" 
            :expand-icon="expandIcon" 
            :theme-overrides="menuThemeOverrides"
            default-value="dashboard"
        />
    </n-layout-sider>
</template>

<script lang="ts">
import { defineComponent, h, ref } from 'vue';
import { NIcon } from 'naive-ui';
import { HomeOutline, PersonOutline, CreateOutline, CaretDownOutline } from '@vicons/ionicons5';
import { Link } from '@inertiajs/vue3';
import { MenuThemeOverrides } from '../types/theme-overrides.types';

const menuOptions = [
    {
        label: 'Dashboard',
        key: 'dashboard',
        href: '/admin/dashboard',
        icon: HomeOutline
    },
    {
        label: 'Registration',
        key: 'registration',
        icon: CreateOutline,
        children: [
            {
                label: 'Create Registration Paths',
                key: 'create-registration-paths',
                href: '/registration/paths'
            },
            {
                label: 'Create Student Registration',
                key: 'create-student-registration',
                href: '/registration/students'
            }
        ]
    },
    {
        label: 'Students',
        key: 'students',
        icon: PersonOutline,
        children: [
            {
                label: 'List of Students',
                key: 'list-of-students',
                href: '/students/list'
            },
            {
                label: 'Students by Batch',
                key: 'students-by-batch',
                href: '/students/batch'
            },
            {
                label: 'Registration Request',
                key: 'registration-request',
                href: '/students/requests'
            }
        ]
    }
]

export default defineComponent({
    setup() {
        const collapsed = ref(false);

        // Theme overrides untuk menu
        const menuThemeOverrides: MenuThemeOverrides = {
            itemTextColorActive: 'white',  // Warna teks saat menu dipilih
            itemIconColorActive: 'white',
            itemColorActive: '#55679C',      // Warna background saat menu dipilih
            itemColorActiveHover: '#7C93C3',
            itemTextColorActiveHover: 'white',
            itemIconColorActiveHover: 'white',
            itemTextColorChildActive: 'black',
            itemIconColorChildActive: 'black',
        }

        return {
            menuOptions,
            collapsed,
            menuThemeOverrides,
            renderMenuLabel(option) {
                return h(Link, { href: option.href }, () => option.label)
            },
            renderMenuIcon(option) {
                return option.icon ? h(NIcon, null, { default: () => h(option.icon) }) : null
            },
            expandIcon() {
                return h(NIcon, null, { default: () => h(CaretDownOutline) })
            }
        }
    }
})
</script>
