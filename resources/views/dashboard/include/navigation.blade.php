<style>
    .sidebar-wrapper::-webkit-scrollbar {
        width: 7px;

    }

    .sidebar-wrapper::-webkit-scrollbar-thumb {
        background-color: #ffffff;
        border-radius: 5px;
        display: inline-block;
    }

    .sidebar-wrapper:hover::-webkit-scrollbar-thumb {
        background-color: #888;
        transition: all 1s ease;
    }


    .sidebar-wrapper::-webkit-scrollbar-track {
        background: #ffffff;
    }

    li {
        margin-top: 0px !important;
    }

    li.menu-label {
        padding: 5px
    }
</style>


<ul class="metismenu" id="menu">
    <li>
        <a href="{{ route('corrective_actions.index') }}">
            <div class="parent-icon icon-color-1"><i class="bx bx-home-alt"></i>
            </div>
            <div class="menu-title">{{ __('Corrective Actions') }}</div>
        </a>
    </li>


</ul>

<script>
    const element = document.querySelector('.mm-active');
    console.log(element.parentElement);
    if (element) {

        element.parentElement.scrollIntoView({
            behavior: 'smooth'
        });
    } else {
        console.error('Element not found.');
    }
</script>
