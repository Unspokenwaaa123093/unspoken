/**
 * Modern, tek sayfalık web sitesi - Vanilla JavaScript
 * Renk paleti: Siyah, Gece Kırmızısı, Gece Mavisi, Turuncu
 * Mouse ve jiroskop ile kontrollü, yumuşak renk geçişleri
 * Hafif glow ile derinlik hissi
 */

document.addEventListener("DOMContentLoaded", () => {

    // Canvas ve context
    const canvas = document.getElementById('background-canvas');
    if (!canvas) return; // güvenlik
    const ctx = canvas.getContext('2d');

    // Renk paleti - Modern ve sade
    const colors = {
        black: { r: 0, g: 0, b: 0 },
        darkRed: { r: 85, g: 25, b: 25 },
        darkBlue: { r: 20, g: 30, b: 70 },
        orange: { r: 190, g: 95, b: 45 }
    };

    // Mouse pozisyonu (normalize: 0-1)
    let mouseX = 0.5;
    let mouseY = 0.5;

    // Mevcut ve hedef renk
    let currentColor = { r: 0, g: 0, b: 0 };
    let targetColor  = { r: 0, g: 0, b: 0 };

    // Canvas boyutlandırma
    function resizeCanvas() {
        canvas.width = window.innerWidth;
        canvas.height = window.innerHeight;
    }

    // Mouse hareketi
    function handleMouseMove(e) {
        mouseX = e.clientX / window.innerWidth;
        mouseY = e.clientY / window.innerHeight;
        updateTargetColor();
    }

    // Device orientation (mobil)
    function handleOrientation(e) {
        if (e.gamma !== null && e.beta !== null) {
            mouseX = Math.max(0, Math.min(1, (e.gamma + 90) / 180));
            mouseY = Math.max(0, Math.min(1, (e.beta + 90) / 180));
            updateTargetColor();
        }
    }

    // Hedef rengi hesapla
    function updateTargetColor() {
        const topColor = lerpColor(colors.black, colors.darkBlue, mouseX);
        const bottomColor = lerpColor(colors.darkRed, colors.orange, mouseX);
        targetColor = lerpColor(topColor, bottomColor, mouseY);
    }

    // Renk interpolasyonu
    function lerpColor(c1, c2, f) {
        return {
            r: c1.r + (c2.r - c1.r) * f,
            g: c1.g + (c2.g - c1.g) * f,
            b: c1.b + (c2.b - c1.b) * f
        };
    }

    function lerp(a, b, f) {
        return a + (b - a) * f;
    }

    // Arka plan çizimi
    function drawBackground() {
        currentColor.r = lerp(currentColor.r, targetColor.r, 0.05);
        currentColor.g = lerp(currentColor.g, targetColor.g, 0.05);
        currentColor.b = lerp(currentColor.b, targetColor.b, 0.05);

        const r = currentColor.r | 0;
        const g = currentColor.g | 0;
        const b = currentColor.b | 0;

        const mainColor = `rgb(${r}, ${g}, ${b})`;

        const glowColor = `rgba(
            ${Math.min(255, r + 30)},
            ${Math.min(255, g + 30)},
            ${Math.min(255, b + 30)},
            0.4
        )`;

        const cx = canvas.width * mouseX;
        const cy = canvas.height * mouseY;
        const radius = Math.max(canvas.width, canvas.height) * 0.8;

        const gradient = ctx.createRadialGradient(cx, cy, 0, cx, cy, radius);

        gradient.addColorStop(0, glowColor);
        gradient.addColorStop(0.3, mainColor);
        gradient.addColorStop(
            1,
            `rgb(${Math.max(0, r - 20)}, ${Math.max(0, g - 20)}, ${Math.max(0, b - 20)})`
        );

        ctx.fillStyle = gradient;
        ctx.fillRect(0, 0, canvas.width, canvas.height);
    }

    // Animasyon
    function animate() {
        drawBackground();
        requestAnimationFrame(animate);
    }

    // Eventler
    window.addEventListener('mousemove', handleMouseMove);
    window.addEventListener('deviceorientation', handleOrientation);
    window.addEventListener('resize', resizeCanvas);

    // Başlangıç
    resizeCanvas();
    updateTargetColor();
    animate();

});

