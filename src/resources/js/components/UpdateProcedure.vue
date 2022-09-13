<template>
    <div class="flex justify-around flex-wrap items-center mb-16">
        <div class="flex">
            <div class="w-72 h-72 mb-12 sm:mb-0">
                <div
                    class="relative flex w-full h-full justify-center items-center bg-gray-200"
                >
                    <input
                        type="file"
                        name="file"
                        title
                        ref="preview"
                        @change="onChange"
                        class="absolute w-full h-full top-0 left-0 opacity-0 cursor-pointer z-10"
                    />
                    <p class="text-gray-400 text-center mb-0">
                        <span class="block"
                            >クリックして料理の写真を載せる</span
                        >
                        <br />
                        <i class="fas fa-camera fa-2x"></i>
                    </p>
                    <div class="absolute w-full h-full top-0 left-0" v-if="url">
                        <img
                            class="w-72 h-72 object-cover bg-center"
                            :src="url"
                        />
                    </div>
                    <div class="absolute w-full h-full top-0 left-0" v-else>
                        <img
                            class="w-72 h-72 object-cover bg-center"
                            :src="
                                'https://piscare-s3-image.s3.ap-northeast-1.amazonaws.com/' +
                                procedure.photo
                            "
                        />
                    </div>
                </div>
            </div>
        </div>
        <div class="w-3/4 sm:w-2/4">
            <textarea
                rows="6"
                name="procedure"
                class="block p-2.5 w-full text-sm text-gray-900 bg-white rounded-md border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                placeholder="手順を入力してください。"
                :value="procedure.procedure"
            ></textarea>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        procedure: {
            type: Object,
        },
    },
    data() {
        return {
            procedure: this.procedure,
            url: "",
            maxTextCount: 30,
        };
    },
    methods: {
        onChange() {
            const file = this.$refs.preview.files[0];
            this.url = URL.createObjectURL(file);
        },
    },
    computed: {
        isTextMax() {
            return this.texts.length >= this.maxTextCount;
        },
    },
};
</script>
