"use strict";

document.addEventListener('DOMContentLoaded', () => {
    const videoContainers = document.querySelectorAll('.video-player-container');

    videoContainers.forEach(container => {
        const poster = container.querySelector('.video-poster');
        const playButton = container.querySelector('.play-button');
        const videoWrapper = container.querySelector('.video-wrapper');
        const iframe = videoWrapper.querySelector('iframe');
        const videoElement = videoWrapper.querySelector('video'); // Если используете HTML5 video

        // При клике на постер или кнопку Play
        const activateVideo = () => {
            poster.classList.add('hidden'); // Скрываем постер
            videoWrapper.classList.remove('hidden'); // Показываем видео
            
            // Запускаем видео, если это iframe (YouTube/Vimeo)
            if (iframe && iframe.src.includes('autoplay=1')) {
                // Если autoplay уже есть в src, просто убеждаемся, что он там
            } else if (iframe) {
                // Если autoplay нет, добавляем его (для предотвращения двойного запуска)
                const currentSrc = iframe.src;
                if (!currentSrc.includes('autoplay')) {
                    iframe.src += (currentSrc.includes('?') ? '&' : '?') + 'autoplay=1';
                }
            } else if (videoElement) {
                videoElement.play();
            }
        };
        if (playButton) {
            playButton.addEventListener('click', activateVideo);
        }
        if (poster) {
            poster.addEventListener('click', activateVideo);
        }
    });
});