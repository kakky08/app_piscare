<template>
    <div class="show-card-like mr-8">
        <button type="button" class="m-0 p-1 shadow-none">
            <i
                class="fas fa-heart mr-1 fa-2x "
                :class="this.isLikedBy ? 'text-red-500' : 'text-gray-300'"
                @click="clickLike"
            />
        </button>
        <span class="show-card-icon-count">{{ countLikes }}</span>
    </div>
</template>
<script>
export default {
    props: {
        initialIsLikedBy: {
            type: Boolean,
            default: false,
        },
        initialCountLikes: {
            type: Number,
            default: 0,
        },
        authorized: {
            type: Boolean,
            default: false,
        },
        endpoint: {
            type: String,
        },
    },
    data() {
        return {
            isLikedBy: this.initialIsLikedBy,
            countLikes: this.initialCountLikes,
        };
    },
    methods: {
        clickLike() {
            if (!this.authorized) {
                alert("いいね機能はログイン中のみ使用できます");
                return;
            }

            this.isLikedBy ? this.unlike() : this.like();
        },

        async like() {
            const response = await axios.put(this.endpoint);

            this.isLikedBy = true;
            this.countLikes = response.data.countLikes;
        },
        async unlike() {
            const response = await axios.delete(this.endpoint);

            this.isLikedBy = false;
            this.countLikes = response.data.countLikes;
        },
    },
};
</script>
