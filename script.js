/**
 * Modern, tek sayfalık web sitesi - Vanilla JavaScript
 * Renk paleti: Siyah, Gece Kırmızısı, Gece Mavisi, Turuncu
 * Mouse ve jiroskop ile kontrollü, yumuşak renk geçişleri
 * Hafif glow ile derinlik hissi
 */

// Canvas ve context
const canvas = document.getElementById('background-canvas');
const ctx = canvas.getContext('2d');

// Renk paleti - Modern ve sade
const colors = {
    black: { r: 0, g: 0, b: 0 },
    darkRed: { r: 85, g: 25, b: 25 },      // Gece kırmızısı
    darkBlue: { r: 20, g: 30, b: 70 },    // Gece mavisi
    orange: { r: 190, g: 95, b: 45 }      // Turuncu
};

// Mouse pozisyonu (normalize: 0-1)
let mouseX = 0.5;
let mouseY = 0.5;
 
// Mevcut ve hedef renk değerleri
let currentColor = { r: 0, g: 0, b: 0 };
let targetColor = { r: 0, g: 0, b: 0 };

// Canvas boyutlandırma
function resizeCanvas() {
    canvas.width = window.innerWidth;
    canvas.height = window.innerHeight;
}

// Mouse hareketi - anlık tepki
function handleMouseMove(e) {
    mouseX = e.clientX / window.innerWidth;
    mouseY = e.clientY / window.innerHeight;
    updateTargetColor();
}

// Device orientation - mobil jiroskop desteği
function handleOrientation(e) {
    if (e.gamma !== null && e.beta !== null) {
        // gamma: -90 to 90 (sol-sağ eğim)
        // beta: -180 to 180 (ön-arka eğim)
        mouseX = Math.max(0, Math.min(1, (e.gamma + 90) / 180));
        mouseY = Math.max(0, Math.min(1, (e.beta + 90) / 180));
        updateTargetColor();
    }
}

// Hedef rengi hesapla - 4 köşe arası geçiş
function updateTargetColor() {
    // Sol üst: Siyah
    // Sağ üst: Gece mavisi
    // Sol alt: Gece kırmızısı
    // Sağ alt: Turuncu (baskın)
    
    const topColor = lerpColor(colors.black, colors.darkBlue, mouseX);
    const bottomColor = lerpColor(colors.darkRed, colors.orange, mouseX);
    targetColor = lerpColor(topColor, bottomColor, mouseY);
}

// İki renk arası interpolasyon (linear interpolation)
function lerpColor(color1, color2, factor) {
    return {
        r: color1.r + (color2.r - color1.r) * factor,
        g: color1.g + (color2.g - color1.g) * factor,
        b: color1.b + (color2.b - color1.b) * factor
    };
}

// Yumuşak geçiş - akıcı ama gözü yormayan
function lerp(start, end, factor) {
    return start + (end - start) * factor;
}

// Canvas'a gradient ile derinlikli arka plan çiz
function drawBackground() {
    // Akıcı renk geçişi - hızlı ama yumuşak (0.05)
    currentColor.r = lerp(currentColor.r, targetColor.r, 0.05);
    currentColor.g = lerp(currentColor.g, targetColor.g, 0.05);
    currentColor.b = lerp(currentColor.b, targetColor.b, 0.05);
    
    const r = Math.round(currentColor.r);
    const g = Math.round(currentColor.g);
    const b = Math.round(currentColor.b);
    
    // Ana renk
    const mainColor = `rgb(${r}, ${g}, ${b})`;
    
    // Hafif glow için daha parlak varyant (derinlik hissi)
    const glowR = Math.min(255, r + 30);
    const glowG = Math.min(255, g + 30);
    const glowB = Math.min(255, b + 30);
    const glowColor = `rgba(${glowR}, ${glowG}, ${glowB}, 0.4)`;
    
    // Radial gradient - merkezden dışa hafif glow
    const centerX = canvas.width * mouseX;
    const centerY = canvas.height * mouseY;
    const radius = Math.max(canvas.width, canvas.height) * 0.8;
    
    const gradient = ctx.createRadialGradient(
        centerX, centerY, 0,
        centerX, centerY, radius
    );
    
    // Yumuşak geçişli gradient - hafif glow
    gradient.addColorStop(0, glowColor);    // Merkez: hafif parlak
    gradient.addColorStop(0.3, mainColor);  // Ana renk
    gradient.addColorStop(1, `rgb(${Math.max(0, r - 20)}, ${Math.max(0, g - 20)}, ${Math.max(0, b - 20)})`); // Kenar: hafif koyu
    
    // Gradient'i çiz
    ctx.fillStyle = gradient;
    ctx.fillRect(0, 0, canvas.width, canvas.height);
}

// Animasyon döngüsü - sürekli çalışır
function animate() {
    drawBackground();
    requestAnimationFrame(animate);
}

// Event listener'lar
window.addEventListener('mousemove', handleMouseMove);
window.addEventListener('deviceorientation', handleOrientation);
window.addEventListener('resize', resizeCanvas);

// Başlangıç
resizeCanvas();
updateTargetColor();
animate();
