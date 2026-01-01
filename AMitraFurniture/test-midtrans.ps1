# Test Midtrans API dengan PowerShell
# Ganti SERVER_KEY dengan credentials Midtrans Sandbox Anda

$SERVER_KEY = "your_server_key_here"

Write-Host "Testing Midtrans Sandbox API" -ForegroundColor Cyan
Write-Host "======================================" -ForegroundColor Cyan
Write-Host ""

# Encode Server Key untuk Basic Auth
$authBytes = [System.Text.Encoding]::ASCII.GetBytes("${SERVER_KEY}:")
$authBase64 = [System.Convert]::ToBase64String($authBytes)

Write-Host "Server Key: $SERVER_KEY" -ForegroundColor Yellow
Write-Host "Auth Header: Basic $authBase64" -ForegroundColor Gray
Write-Host ""

# Prepare request
$orderId = "TEST-$(Get-Date -Format 'yyyyMMddHHmmss')"
$headers = @{
    "Accept" = "application/json"
    "Authorization" = "Basic $authBase64"
    "Content-Type" = "application/json"
}

$body = @{
    transaction_details = @{
        order_id = $orderId
        gross_amount = 10000
    }
    credit_card = @{
        secure = $true
    }
    customer_details = @{
        first_name = "Test"
        last_name = "User"
        email = "test@example.com"
        phone = "08123456789"
    }
} | ConvertTo-Json -Depth 10

Write-Host "Request Body:" -ForegroundColor Yellow
Write-Host $body -ForegroundColor Gray
Write-Host ""

Write-Host "Sending request to Midtrans..." -ForegroundColor Yellow

try {
    $response = Invoke-RestMethod -Uri "https://app.sandbox.midtrans.com/snap/v1/transactions" `
                                  -Method POST `
                                  -Headers $headers `
                                  -Body $body
    
    Write-Host ""
    Write-Host "✅ SUCCESS!" -ForegroundColor Green
    Write-Host ""
    Write-Host "Response:" -ForegroundColor Green
    Write-Host ($response | ConvertTo-Json -Depth 10) -ForegroundColor White
    Write-Host ""
    
    if ($response.token) {
        Write-Host "Snap Token: $($response.token)" -ForegroundColor Cyan
        Write-Host "Redirect URL: $($response.redirect_url)" -ForegroundColor Cyan
        Write-Host ""
        Write-Host "Test Payment URL:" -ForegroundColor Yellow
        Write-Host $response.redirect_url -ForegroundColor White
    }
    
} catch {
    Write-Host ""
    Write-Host "❌ ERROR!" -ForegroundColor Red
    Write-Host ""
    
    $statusCode = $_.Exception.Response.StatusCode.value__
    Write-Host "Status Code: $statusCode" -ForegroundColor Red
    
    if ($statusCode -eq 401) {
        Write-Host ""
        Write-Host "Error: Unauthorized (401)" -ForegroundColor Red
        Write-Host ""
        Write-Host "Credentials tidak valid!" -ForegroundColor Yellow
        Write-Host ""
        Write-Host "Solusi:" -ForegroundColor Cyan
        Write-Host "1. Buka https://dashboard.sandbox.midtrans.com/" -ForegroundColor White
        Write-Host "2. Login atau daftar akun baru" -ForegroundColor White
        Write-Host "3. Pergi ke Settings > Access Keys" -ForegroundColor White
        Write-Host "4. Copy Server Key (dimulai dengan SB-Mid-server-...)" -ForegroundColor White
        Write-Host "5. Ganti nilai `$SERVER_KEY di script ini atau di .env" -ForegroundColor White
    } else {
        Write-Host "Error Message:" -ForegroundColor Red
        try {
            $reader = New-Object System.IO.StreamReader($_.Exception.Response.GetResponseStream())
            $errorBody = $reader.ReadToEnd()
            Write-Host $errorBody -ForegroundColor White
        } catch {
            Write-Host $_.Exception.Message -ForegroundColor White
        }
    }
}

Write-Host ""
Write-Host "Press any key to continue..."
$null = $Host.UI.RawUI.ReadKey("NoEcho,IncludeKeyDown")
