<script>
    const autoCompleteJS = new autoComplete({
        placeHolder: "タイトル/本文",
        data: {
            src: {!! json_encode($allPosts, JSON_UNESCAPED_UNICODE) !!},
            cache: true,
        },
        events: {
            input: {
                selection: (event) => {
                    const selection = event.detail.selection.value;
                    autoCompleteJS.input.value = selection;
                }
            }
        },
        onSelection: feedback => {
            submitForm();
        }
    });

    function submitForm() {
        document.getElementById('searchForm').submit();
    }
</script>

<style>
    .autoComplete_wrapper {
        display: inline-block;
        position: relative;
    }

    .autoComplete_wrapper>input {
        width: 300px;
        height: 35px;
        padding-left: 10px;
        font-size: 1rem;
        outline: 0;
    }

    .autoComplete_wrapper>input::placeholder {
        color: rgba(123, 123, 123, 0.5);
        transition: all 0.3s ease;
    }

    .autoComplete_wrapper>ul {
        position: absolute;
        max-height: 226px;
        overflow-y: scroll;
        top: 100%;
        left: 0;
        right: 0;
        padding: 0;
        margin: 0.5rem 0 0 0;
        background-color: #fff;
        border: 1px solid rgba(33, 33, 33, 0.1);
        z-index: 1000;
        outline: 0;
    }

    .autoComplete_wrapper>ul>li {
        padding: 10px 20px;
        list-style: none;
        text-align: left;
        font-size: 14px;
        color: #212121;
        transition: all 0.1s ease-in-out;
        background-color: #fff;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        transition: all 0.2s ease;
    }

    .autoComplete_wrapper>ul>li::selection {
        color: rgba(255, 255, 255, 0);
        background-color: rgba(255, 255, 255, 0);
    }

    .autoComplete_wrapper>ul>li:hover {
        cursor: pointer;
        background-color: rgba(123, 123, 123, 0.1);
    }

    .autoComplete_wrapper>ul>li mark {
        background-color: transparent;
        color: #ff7a7a;
        font-weight: 700;
    }

    .autoComplete_wrapper>ul>li mark::selection {
        color: rgba(255, 255, 255, 0);
        background-color: rgba(255, 255, 255, 0);
    }

    .autoComplete_wrapper>ul>li[aria-selected=true] {
        background-color: rgba(123, 123, 123, 0.1);
    }

    @media only screen and (max-width: 600px) {
        .autoComplete_wrapper>input {
            width: 12rem;
        }
    }
</style>
