<template>
    <div class="col-4 image-input-block">
        <div class="w-40 h-40 lg:w-52 lg:h-52 rounded-full bg-gray-200">
            <div
                class="relative w-full h-full flex justify-center items-center"
            >
                <input
                    type="file"
                    name="file"
                    title
                    ref="preview"
                    @change="onChange"
                    class="absolute w-full h-full top-0 left-0 z-50 opacity-0 cursor-pointer"
                />
                <p class="text-gray-400 text-center mb-0">
                    <span class="block"
                        >クリックして<br />アイコンを載せる</span
                    >
                    <br />
                    <i class="fas fa-camera fa-2x"></i>
                </p>
                <div class="absolute w-full h-full top-0 left-0" v-if="url">
                    <img
                        class="w-40 h-40 lg:w-52 lg:h-52 object-cover bg-center rounded-full border-2 border-solid border-yellow-300"
                        :src="url"
                    />
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "ProfileImagePreviewComponent",
    data() {
        return {
            url: "",
        };
    },
    methods: {
        onChange() {
            const file = this.$refs.preview.files[0];
            this.url = URL.createObjectURL(file);
        },
    },
};
</script>
