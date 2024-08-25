<template>
    <n-space vertical>
        <n-layout>
            <n-modal-provider>
                <n-message-provider>
                    <n-back-top :right="100" />
                    <n-layout-header>
                        <Navbar :fullname="user.fullname" :isAdmin="user.isAdmin" />
                    </n-layout-header>
                    <n-layout has-sider class="vh-100">
                        <Sidebar />
                        <n-layout-content content-style="padding: 24px;">
                            <slot />
                        </n-layout-content>
                    </n-layout>
                </n-message-provider>
            </n-modal-provider>
        </n-layout>
    </n-space>
</template>

<script lang="ts">
import { defineComponent } from 'vue';
import Sidebar from '../Components/Sidebar.vue';
import Navbar from '../Components/Navbar.vue';
import { usePage } from '@inertiajs/vue3';

export default defineComponent({
    setup() {
        const page = usePage();
        const user = page.props.auth.user;

        return {
            user
        }
    },
    components: {
        Sidebar,
        Navbar
    }
});
</script>