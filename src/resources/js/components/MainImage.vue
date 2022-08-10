<template>
    <div class="row cols-2 procedure-form-group">
        <div class="col-4 image-input-block" >
            <div class=" image-input-box main-image">
                <div class="image-input-field">
                    <input type="file" name="file" title ref="preview" @change="onChange">
                    <p>
                        <span class="image-input-text">クリックして料理の写真を載せる</span>
                        <br>
                        <i class="fas fa-camera fa-2x"></i>
                    </p>
                    <div class="preview-box" v-if="image">
                        <img class="preview-image main-image" :src="'https://piscare-s3-image.s3.ap-northeast-1.amazonaws.com/' + image">
                    </div>
                    <div class="preview-box" v-if="url">
                        <img class="preview-image main-image" :src="url">
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
        image: {
            type:String
        },
    },
    data(){
        return {
            url: this.url,
            image: this.image
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
