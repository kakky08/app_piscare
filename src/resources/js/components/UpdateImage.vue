<template>
    <div class="row cols-2 procedure-form-group">
        <div class="col-4 image-input-block" >
            <div class=" image-input-box">
                <div class="image-input-field">
                    <input type="file" name="file" title ref="preview" @change="onChange">
                    <p>
                        <span class="image-input-text">クリックして料理の写真を載せる</span>
                        <br>
                        <i class="fas fa-camera fa-2x"></i>
                    </p>
                    <div class="preview-box" v-if="url">
                        <img class="preview-image" :src="url">
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>


<script>
export default {
    name: "ProfileImagePreviewComponent",
    props:{
        url: {
            type: String
        },
        /* name: {
            type: String
        } */
    },
    data(){
        return {
            url: this.url,
            // name: this.name,
        }
    },
    methods: {
        onChange(){
            const file = this.$refs.preview.files[0];
            this.url = URL.createObjectURL(file);
        }
    },
    mounted () {
        this.$emit('file', this.url)
    }
}
</script>
