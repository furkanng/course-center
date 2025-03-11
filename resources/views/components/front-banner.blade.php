<div class="row">
    <div class="col-xxl-8 col-xl-8 col-lg-8">
        <div class="swiper mySwiper">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <img src="https://hangiderslig.com/storage/company_images/1735593946536.jpeg" alt="">
                </div>
                <div class="swiper-slide">
                    <img src="https://hangiderslig.com/storage/company_images/1735593947733.jpeg" alt="">
                </div>
                <div class="swiper-slide">
                    <img src="https://hangiderslig.com/storage/company_images/173559394695.jpeg" alt="">
                </div>
            </div>
            <div class="swiper-pagination"></div>
            <div class="autoplay-progress">
                <svg style="display: none" viewBox="0 0 48 48">
                    <circle style="display: none" cx="24" cy="24" r="20"></circle>
                </svg>
                <span style="display: none"></span>
            </div>
        </div>
    </div>

    <div class="col-xxl-4 col-xl-4 col-lg-4">
        sadfsadflasdfasdfksd
    </div>
</div>

<script>
    const progressCircle = document.querySelector(".autoplay-progress svg");
    const progressContent = document.querySelector(".autoplay-progress span");
    var swiper = new Swiper(".mySwiper", {
        spaceBetween: 30,
        centeredSlides: true,
        autoplay: {
            delay: 2500,
            disableOnInteraction: false
        },
        pagination: {
            el: ".swiper-pagination",
            clickable: true
        },
        on: {
            autoplayTimeLeft(s, time, progress) {
                progressCircle.style.setProperty("--progress", 1 - progress);
                progressContent.textContent = `${Math.ceil(time / 1000)}s`;
            }
        }
    });
</script>

<style>
    /* Swiper kaplayacağı alanı responsive şekilde kullanacak */
    .swiper {
        width: 100%;
        /* İsterseniz yüksekliği otomatik bırakarak resme göre uzamasını sağlayabilirsiniz */
        height: auto;
        position: relative; /* autoplay-progress konumu için */
    }

    /* Slayt kapsayıcısına yuvarlatma ve taşıyor ise gizleme ayarı */
    .swiper-slide {
        border-radius: 15px; /* Kenarları yuvarlatmak için */
        overflow: hidden;    /* Görüntünün kenarlardan taşmaması için */
        text-align: center;
        font-size: 18px;
        background: #fff;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    /* Resmin tam kaplamasını ve oran korumasını ayarlar */
    .swiper-slide img {
        width: 100%;
        height: auto;        /* Boyunu otomatik ayarla (oran korunsun) */
        object-fit: cover;   /* Alanı tam doldur; gerekirse kes */
        object-position: center;
    }

    /* İsteğe bağlı olarak mobilde farklı yükseklik isterseniz media query kullanabilirsiniz */
    @media (max-width: 576px) {
        /* Örnek: mobilde slide yüksekliği 250px olsun */
        .swiper-slide {
            height: 250px;
        }
    }

    .autoplay-progress {
        position: absolute;
        right: 16px;
        bottom: 16px;
        z-index: 10;
        width: 48px;
        height: 48px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: bold;
        color: var(--swiper-theme-color);
    }

    .autoplay-progress svg {
        --progress: 0;
        position: absolute;
        left: 0;
        top: 0px;
        z-index: 10;
        width: 100%;
        height: 100%;
        stroke-width: 4px;
        stroke: var(--swiper-theme-color);
        fill: none;
        stroke-dashoffset: calc(125.6px * (1 - var(--progress)));
        stroke-dasharray: 125.6;
        transform: rotate(-90deg);
    }
</style>
