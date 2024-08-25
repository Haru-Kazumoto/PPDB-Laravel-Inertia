<template>
    <Head title="Create new registration path" />
    
    <div class="d-flex flex-column gap-4">
        <Back toRouteName="registration-path.index" />
        <div class="d-flex flex-column">
            <p class="fs-4">Create new path</p>
            <div class="card" style="height: 250px;">
                <div class="card-body">
                    <n-form
                        ref="formRef"
                        :label-width="90"
                        :model="model"
                        :rules="rules"
                        @submit.prevent="submitCreatePath"
                    >
                        <n-form-item label="Path name" path="model.path_name">
                            <n-input v-model:value="model.path_name" placeholder="Insert path name" />
                        </n-form-item>
                        <n-form-item label="Path name" path="model.path_name">
                            <n-select v-model:value="model.path_type" :options="options" />
                        </n-form-item>
                        <n-button attr-type="submit" type="primary" color="#55679C" style="width: 100px;">Submit</n-button>
                    </n-form>
                </div>
            </div>
        </div>
    </div>
</template>

<script lang="ts">
import { defineComponent, ref } from 'vue';
import { Head, Link, useForm } from '@inertiajs/vue3';
import { ArrowBack } from "@vicons/ionicons5";
import { FormInst, FormRules } from 'naive-ui';
import { RegistrationPathCreateDTO } from '@/types/request.types';
import Back from '@/Components/Back.vue';

export default defineComponent({
    setup() {
        const formRef = ref<FormInst | null>(null);
        const form = useForm<RegistrationPathCreateDTO>({
            path_name: '',
            path_type: '',
        });

        const rules: FormRules = {
            path_name: {
                required: true,
                message: 'Path name is required',
            },
            path_type: {
                required: true,
                message: 'Path type is required',
            }
        }

        const options = [
            {
                label: 'PURCHASING',
                value: 'PURCHASING',
            },
            {
                label: 'RETURNING',
                value: 'RETURNING',
            }
        ]

        function submitCreatePath(e: Event) {
            e.preventDefault();

            formRef.value?.validate().then(() => {
                form.post(route('registration-path.store'), {
                    onSuccess: () => {
                        form.reset();
                    }
                });
            });
        }

        return {
            model: form,
            rules,
            options,
            formRef,
            submitCreatePath,
        }
    },
    components: {
        Head,
        Link,
        ArrowBack,
        Back
    }
})
</script>

<style scoped></style>