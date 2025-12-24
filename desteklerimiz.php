<!DOCTYPE html>
<html lang="tr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Desteklerimiz - Unspoken Archive | TR</title>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }
    
    body {
      font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
      background: #0d0d0d;
      color: #e0e0e0;
      line-height: 1.6;
      overflow-x: hidden;
    }
    
    .header {
      background: rgba(0, 0, 0, 0.95);
      backdrop-filter: blur(10px);
      border-bottom: 1px solid rgba(255, 255, 255, 0.1);
      position: sticky;
      top: 0;
      z-index: 1000;
    }
    
    .header-container {
      max-width: 1600px;
      margin: 0 auto;
      padding: 0 20px;
    }
    
    .header-top {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 20px 0;
    }
    
    .site-logo {
      display: flex;
      align-items: center;
      gap: 15px;
    }
    
    .logo-icon {
      width: 40px;
      height: 40px;
      background: linear-gradient(135deg, #1a1a1a, #2a2a2a);
      border: 1px solid rgba(255, 255, 255, 0.1);
      display: flex;
      align-items: center;
      justify-content: center;
      font-weight: bold;
      color: #fff;
      border-radius: 4px;
    }
    
    .site-title {
      font-size: 1.5rem;
      font-weight: 600;
      color: #fff;
      letter-spacing: -0.5px;
    }
    
    .header-actions {
      display: flex;
      gap: 10px;
    }
    
    button, .btn {
      padding: 10px 20px;
      border-radius: 6px;
      font-size: 0.95rem;
      font-weight: 600;
      cursor: pointer;
      transition: all 0.3s;
      border: 1px solid rgba(255, 255, 255, 0.1);
      background: #1a1a1a;
      color: #fff;
      text-decoration: none;
      display: inline-block;
    }
    
    button:hover, .btn:hover {
      transform: translateY(-1px);
      background: #222;
    }
    
    button.primary, .btn.primary {
      background: #fff;
      color: #000;
      border: none;
    }
    
    button.primary:hover, .btn.primary:hover {
      background: #e0e0e0;
    }
    
    .main-container {
      max-width: 1600px;
      margin: 0 auto;
      padding: 40px 20px;
    }
    
    .page-header {
      text-align: center;
      margin-bottom: 50px;
    }
    
    .page-title {
      font-size: 3rem;
      font-weight: 800;
      color: #fff;
      margin-bottom: 15px;
      letter-spacing: -1px;
    }
    
    .page-subtitle {
      font-size: 1.2rem;
      color: #888;
      max-width: 700px;
      margin: 0 auto;
    }
    
    .destek-grid {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
      gap: 25px;
      margin-top: 40px;
    }
    
    .destek-card {
      background: #111;
      border-radius: 12px;
      overflow: hidden;
      border: 1px solid rgba(255, 255, 255, 0.05);
      transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
      cursor: pointer;
    }
    
    .destek-card:hover {
      transform: translateY(-8px);
      border-color: rgba(255, 69, 0, 0.4);
      box-shadow: 0 20px 40px rgba(0, 0, 0, 0.4);
    }
    
    .destek-image-container {
      position: relative;
      padding-top: 75%;
      background: #000;
      overflow: hidden;
    }
    
    .destek-image {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      object-fit: cover;
      transition: transform 0.6s ease;
    }
    
    .destek-card:hover .destek-image {
      transform: scale(1.05);
    }
    
    .destek-content {
      padding: 20px;
    }
    
    .destek-title {
      font-size: 1.25rem;
      font-weight: 700;
      color: #fff;
      margin-bottom: 10px;
      line-height: 1.4;
    }
    
    .destek-description {
      color: #888;
      font-size: 0.95rem;
      margin-bottom: 15px;
      display: -webkit-box;
      -webkit-line-clamp: 3;
      -webkit-box-orient: vertical;
      overflow: hidden;
    }
    
    .destek-link {
      display: inline-block;
      background: #fff;
      color: #000;
      padding: 8px 16px;
      text-decoration: none;
      font-weight: bold;
      border-radius: 5px;
      font-size: 0.9rem;
      transition: all 0.3s;
    }
    
    .destek-link:hover {
      background: #e0e0e0;
      transform: translateX(3px);
    }

    .modal {
      display: none;
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: rgba(0, 0, 0, 0.95);
      z-index: 2000;
      overflow-y: auto;
      padding: 20px;
      backdrop-filter: blur(10px);
    }
    
    .modal.active {
      display: block;
    }
    
    .modal-container {
      max-width: 900px;
      margin: 40px auto;
      background: #0a0a0a;
      border-radius: 16px;
      border: 1px solid rgba(255, 255, 255, 0.1);
      overflow: hidden;
      position: relative;
    }
    
    .modal-close {
      position: absolute;
      top: 20px;
      right: 20px;
      width: 40px;
      height: 40px;
      background: rgba(255, 255, 255, 0.1);
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      cursor: pointer;
      color: #fff;
      font-size: 24px;
      z-index: 10;
      transition: all 0.3s;
    }
    
    .modal-close:hover {
      background: rgba(255, 255, 255, 0.2);
      transform: rotate(90deg);
    }
    
    .modal-image-container {
      background: #000;
      min-height: 300px;
      display: flex;
      align-items: center;
      justify-content: center;
      border-bottom: 1px solid #222;
    }
    
    .modal-image-container img {
      max-width: 100%;
      max-height: 500px;
      object-fit: contain;
    }
    
    .modal-content {
      padding: 30px;
    }
    
    .modal-title {
      font-size: 2rem;
      font-weight: 800;
      color: #fff;
      margin-bottom: 20px;
      letter-spacing: -0.5px;
    }
    
    .modal-description {
      font-size: 1.1rem;
      color: #ccc;
      line-height: 1.8;
      margin-bottom: 25px;
      white-space: pre-wrap;
    }
    
    .modal-link-container {
      display: flex;
      gap: 15px;
      flex-wrap: wrap;
    }
    
    .state-message {
      text-align: center;
      padding: 100px 20px;
      color: #888;
      font-size: 1.2rem;
    }
    
    @media (max-width: 768px) {
      .page-title {
        font-size: 2rem;
      }
      
      .page-subtitle {
        font-size: 1rem;
      }
      
      .destek-grid {
        grid-template-columns: 1fr;
        gap: 20px;
      }
      
      .site-title {
        font-size: 1.2rem;
      }
      
      .header-actions {
        gap: 5px;
      }
      
      button, .btn {
        padding: 8px 12px;
        font-size: 0.85rem;
      }
      
      .modal-container {
        margin: 20px auto;
      }
      
      .modal-content {
        padding: 20px;
      }
      
      .modal-title {
        font-size: 1.5rem;
      }
      
      .modal-description {
        font-size: 1rem;
      }
    }
    
    @media (max-width: 480px) {
      .main-container {
        padding: 20px 15px;
      }
      
      .page-header {
        margin-bottom: 30px;
      }
      
      .site-logo {
        gap: 10px;
      }
      
      .logo-icon {
        width: 35px;
        height: 35px;
      }
    }
  </style>
</head>
<body>
  <header class="header">
    <div class="header-container">
      <div class="header-top">
        <div class="site-logo">
          <div class="logo-icon">UA</div>
          <div class="site-title">Desteklerimiz</div>
        </div>
        <div class="header-actions">
          <a href="index.html" class="btn">← Ana Sayfa</a>
        </div>
      </div>
    </div>
  </header>

  <main class="main-container">
    <div class="page-header">
      <h1 class="page-title">Desteklerimiz</h1>
      <p class="page-subtitle">Adalet, özgürlük ve hakikat için mücadele eden kişi ve olayları destekliyoruz</p>
    </div>
    
    <div id="destek-listesi" class="destek-grid"></div>
  </main>

  <div id="modal-ekran" class="modal">
    <div class="modal-container">
      <span class="modal-close" onclick="kapatModal()">&times;</span>
      <div id="modal-detay"></div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/@supabase/supabase-js@2"></script>
  <script src="config.js"></script>
  <script>
    const { createClient } = supabase;
    const supabaseClient = createClient(SUPABASE_CONFIG.url, SUPABASE_CONFIG.key);

    const content = document.getElementById('destek-listesi');
    const modal = document.getElementById('modal-ekran');
    const modalDetay = document.getElementById('modal-detay');

    function acModal(destek) {
      modalDetay.innerHTML = `
        <div class="modal-image-container">
          <img src="${destek.destek_foto_url}" alt="${destek.baslik}">
        </div>
        <div class="modal-content">
          <h1 class="modal-title">${destek.baslik}</h1>
          <p class="modal-description">${destek.aciklama}</p>
          <div class="modal-link-container">
            <a href="${destek.destek_url}" target="_blank" class="destek-link">🔗 Desteği İncele</a>
          </div>
        </div>
      `;
      modal.classList.add('active');
      document.body.style.overflow = 'hidden';
    }

    function kapatModal() {
      modal.classList.remove('active');
      document.body.style.overflow = 'auto';
    }

    window.onclick = (e) => {
      if (e.target == modal) kapatModal();
    };

    async function destekleriYukle() {
      try {
        const { data, error } = await supabaseClient
          .from('desteklerimiz')
          .select('*')
          .order('id', { ascending: false });

        if (error) throw error;

        content.innerHTML = '';
        if (data && data.length > 0) {
          data.forEach(destek => {
            const card = document.createElement('div');
            card.className = 'destek-card';
            card.onclick = () => acModal(destek);
            card.innerHTML = `
              <div class="destek-image-container">
                <img src="${destek.destek_foto_url}" class="destek-image" alt="${destek.baslik}">
              </div>
              <div class="destek-content">
                <h3 class="destek-title">${destek.baslik}</h3>
                <p class="destek-description">${destek.ozet}</p>
                <a href="${destek.destek_url}" target="_blank" class="destek-link" onclick="event.stopPropagation()">Desteği İncele →</a>
              </div>
            `;
            content.appendChild(card);
          });
        } else {
          content.innerHTML = '<div class="state-message">Henüz destek kaydı bulunmuyor.</div>';
        }
      } catch (err) {
        content.innerHTML = `<div class="state-message" style="color:red;">HATA: ${err.message}</div>`;
      }
    }

    window.onload = destekleriYukle;

    // Koruma Mekanizmaları
    document.addEventListener('keyup', (e) => {
      if (e.key === 'PrintScreen') {
        navigator.clipboard.writeText('');
        alert('Ekran görüntüsü alma bu sitede engellenmiştir.');
      }
    });
    
    document.addEventListener('keydown', (e) => {
      if (
        (e.ctrlKey && e.shiftKey && e.key === 'S') ||
        (e.metaKey && e.shiftKey && ['3', '4', '5'].includes(e.key)) ||
        (e.metaKey && e.shiftKey && e.key === 's')
      ) {
        e.preventDefault();
        alert('Ekran görüntüsü alma bu sitede engellenmiştir.');
      }
      
      if (e.key === 'F12') {
        e.preventDefault();
        return false;
      }
      
      if (e.ctrlKey && e.shiftKey && ['I', 'J', 'C'].includes(e.key)) {
        e.preventDefault();
        return false;
      }
      
      if (e.ctrlKey && e.key === 'u') {
        e.preventDefault();
        return false;
      }
    });
    
    document.addEventListener('contextmenu', (e) => {
      e.preventDefault();
      alert('Sağ tık menüsü bu sitede devre dışıdır.');
      return false;
    });
    
    document.addEventListener('selectstart', (e) => {
      e.preventDefault();
      return false;
    });
    
    document.addEventListener('copy', (e) => {
      e.preventDefault();
      navigator.clipboard.writeText('');
      return false;
    });
    
    document.addEventListener('dragstart', (e) => {
      e.preventDefault();
      return false;
    });
    
    const devtoolsChecker = () => {
      const threshold = 160;
      const widthThreshold = window.outerWidth - window.innerWidth > threshold;
      const heightThreshold = window.outerHeight - window.innerHeight > threshold;
      
      if (widthThreshold || heightThreshold) {
        document.body.innerHTML = '<div style="display:flex;align-items:center;justify-content:center;height:100vh;background:#000;color:#f00;font-size:2rem;text-align:center;">GELİŞTİRİCİ ARAÇLARI TESPİT EDİLDİ<br>ERİŞİM ENGELLENDİ</div>';
      }
    };
    
    setInterval(devtoolsChecker, 1000);
  </script>
</body>
</html>
