import './bootstrap';

import AOS from 'aos';
import 'aos/dist/aos.css';

AOS.init({
    duration: 1200,
    once: false,
});


    const dot = document.getElementById('cursor-dot');
    const ring = document.getElementById('cursor-ring');

    let mouseX = 0;
    let mouseY = 0;

    let ringX = 0;
    let ringY = 0;

    // =========================
    // MOUSE MOVE
    // =========================
    document.addEventListener('mousemove', (e) => {

        mouseX = e.clientX;
        mouseY = e.clientY;

        dot.style.left = mouseX + 'px';
        dot.style.top = mouseY + 'px';

    });

    // =========================
    // SMOOTH RING FOLLOW
    // =========================
    function animate() {

        ringX += (mouseX - ringX) * 0.15;
        ringY += (mouseY - ringY) * 0.15;

        ring.style.left = ringX + 'px';
        ring.style.top = ringY + 'px';

        requestAnimationFrame(animate);

    }

    animate();

    // =========================
    // HOVER EFFECT
    // =========================
    const hoverElements = document.querySelectorAll(
        'a, button, .group, input, textarea'
    );

    hoverElements.forEach((el) => {

        el.addEventListener('mouseenter', () => {
            document.body.classList.add('cursor-hover');
        });

        el.addEventListener('mouseleave', () => {
            document.body.classList.remove('cursor-hover');
        });

    });