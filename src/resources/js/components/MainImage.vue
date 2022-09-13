<template>
    <div class="flex mb-16">
        <div class="w-96 h-96">
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
                    <span class="block">クリックして料理の写真を載せる</span>
                    <br />
                    <i class="fas fa-camera fa-2x"></i>
                </p>
                <div class="absolute w-full h-full top-0 left-0" v-if="image">
                    <img
                        class="w-96 h-96 object-cover bg-center"
                        :src="
                            'https://piscare-s3-image.s3.ap-northeast-1.amazonaws.com/' +
                            image
                        "
                    />
                </div>
                <div class="absolute w-full h-full top-0 left-0" v-if="url">
                    <img class="w-96 h-96 object-cover bg-center" :src="url" />
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "ProfileImagePreviewComponent",
    props: {
        url: {
            type: String,
        },
        image: {
            type: String,
        },
    },
    data() {
        return {
            url: this.url,
            image: this.image,
        };
    },
    methods: {
        onChange() {
            const file = this.$refs.preview.files[0];
            this.url = URL.createObjectURL(file);
        },
    },
    mounted() {
        this.$emit("file", this.url);
    },
};
</script>
