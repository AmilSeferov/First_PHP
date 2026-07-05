<?php require_once 'includes/header.php'; ?>



<div class="admin-users-container">
    <div class="users-header">
        <h2>👥 İstifadəçi İdarəetməsi</h2>
        <form method="GET" action="index.php" class="users-actions">
            <input type="hidden" name="page" value="admin_users">
            <input type="text" name="search" placeholder="İstifadəçi axtar..." class="search-input" value="<?php echo htmlspecialchars($_GET['search'] ?? ''); ?>">
            <button type="submit" style="padding: 8px 16px; border-radius: 4px; text-decoration: none; font-size: 14px; font-weight: bold; transition: background 0.2s; background-color: #28a745; color: white;">Axtar</button>
        </form>
    </div>

    <div class="table-wrapper">
        <table class="users-table">
            <thead>
                <tr>
                    <th>İstifadəçi</th>
                    <th>Email</th>
                    <th>Cari Rol</th>
                    <th>Rol Dəyiş</th>
                    <th>Qeydiyyat Tarixi</th>
                    <th>Əməliyyatlar</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($users as $user):?>
                <tr>
                    <td>
                        <div class="user-info">
                            <div class="avatar" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);"><?php echo $user['name'][0]??''; ?></div>
                            <div class="details">
                                <span class="name"><?php echo $user['name']??''; ?></span>
                        
                            </div>
                        </div>
                    </td>
                    <td><?php echo $user['email']??''; ?></td>
                    <td>
                        <span class="badge badge-admin"><?php echo $user['role_name']??''; ?></span>
                    </td>
                    <td>
                        <form action="?page=change_role" method="POST" class="role-form">
                            <!-- İstifadəçi ID-si -->
                            <input type="hidden" name="user_id" value="<?php echo $user['id']; ?>">
                            <!-- Rol seçimi dəyişəndə avtomatik form göndəriləcək -->
                            <select class="role-select" name="role_id" onchange="this.form.submit()">
                                <?php foreach($all_roles as $role): ?>
                                    <option value="<?php echo $role['id']; ?>" <?php echo ($role['id'] == $user['role_id']) ? 'selected' : ''; ?>>
                                        <?php echo htmlspecialchars(ucfirst($role['role_name'])); ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </form>
                    </td>
                    <td><?php echo $user['created_at']??''; ?></td>
                    <td>
                        <div class="action-buttons">
                            <!-- Silmək -->
                            <form action="?page=delete_user&id=<?php echo $user['id']; ?>" method="POST" style="margin:0;" onsubmit="return confirm('Bu istifadəçini silmək istədiyinizə əminsiniz?');">
                                <button type="submit" class="btn-action btn-delete" title="Sil">🗑️</button>
                            </form>
                        </div>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Backend axtarış istifadə olunur -->

<?php require_once 'includes/footer.php'; ?>
<style>
/* Premium Users View Styles */
.admin-users-container {
    max-width: 1200px;
    margin: 40px auto;
    padding: 0 20px;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    animation: fadeIn 0.5s ease-in-out;
}

@keyframes fadeIn {
    from { opacity: 0; transform: translateY(10px); }
    to { opacity: 1; transform: translateY(0); }
}

.users-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 25px;
    flex-wrap: wrap;
    gap: 15px;
}

.users-header h2 {
    font-size: 26px;
    color: #1e293b;
    font-weight: 700;
    display: flex;
    align-items: center;
    gap: 12px;
}

.users-actions {
    display: flex;
    gap: 15px;
    align-items: center;
}

.search-input {
    padding: 10px 16px;
    border: 1px solid #cbd5e1;
    border-radius: 8px;
    font-size: 14px;
    outline: none;
    transition: all 0.3s ease;
    width: 280px;
    background-color: #f8fafc;
}

.search-input:focus {
    border-color: #3b82f6;
    background-color: #ffffff;
    box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.15);
}

.table-wrapper {
    background: #ffffff;
    border-radius: 12px;
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.05);
    overflow-x: auto;
    border: 1px solid #e2e8f0;
}

.users-table {
    width: 100%;
    border-collapse: collapse;
    text-align: left;
    white-space: nowrap;
}

.users-table th {
    background-color: #f1f5f9;
    color: #475569;
    font-size: 13px;
    text-transform: uppercase;
    letter-spacing: 0.8px;
    padding: 18px 24px;
    font-weight: 600;
    border-bottom: 2px solid #e2e8f0;
}

.users-table td {
    padding: 16px 24px;
    border-bottom: 1px solid #f1f5f9;
    color: #334155;
    font-size: 14px;
    vertical-align: middle;
}

.users-table tr:last-child td {
    border-bottom: none;
}

.users-table tbody tr {
    transition: background-color 0.2s ease, transform 0.2s ease;
}

.users-table tbody tr:hover {
    background-color: #f8fafc;
}

/* User Info Layout */
.user-info {
    display: flex;
    align-items: center;
    gap: 14px;
}

.user-info .avatar {
    width: 42px;
    height: 42px;
    border-radius: 50%;
    color: white;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: bold;
    font-size: 16px;
    box-shadow: 0 4px 6px rgba(0,0,0,0.1);
}

.user-info .details {
    display: flex;
    flex-direction: column;
}

.user-info .name {
    font-weight: 600;
    color: #0f172a;
    font-size: 15px;
}

.user-info .username {
    font-size: 13px;
    color: #64748b;
    margin-top: 2px;
}

/* Badges */
.badge {
    padding: 6px 12px;
    border-radius: 20px;
    font-size: 12px;
    font-weight: 600;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    box-shadow: 0 2px 4px rgba(0,0,0,0.05);
}

.badge-admin { background-color: #f3e8ff; color: #7e22ce; }
.badge-user { background-color: #e0f2fe; color: #0369a1; }
.badge-editor { background-color: #dcfce7; color: #15803d; }

/* Role Form */
.role-form {
    margin: 0;
}

.role-select {
    padding: 8px 32px 8px 14px;
    border-radius: 8px;
    border: 1px solid #cbd5e1;
    font-size: 13px;
    font-weight: 500;
    color: #334155;
    background-color: #f8fafc;
    cursor: pointer;
    outline: none;
    appearance: none;
    background-image: url("data:image/svg+xml;charset=UTF-8,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none' stroke='%2364748b' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3e%3cpolyline points='6 9 12 15 18 9'%3e%3c/polyline%3e%3c/svg%3e");
    background-repeat: no-repeat;
    background-position: right 10px center;
    background-size: 16px;
    transition: all 0.2s ease;
}

.role-select:hover {
    border-color: #94a3b8;
    background-color: #ffffff;
}

.role-select:focus {
    border-color: #3b82f6;
    background-color: #ffffff;
    box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.15);
}

/* Action Buttons */
.action-buttons {
    display: flex;
    gap: 10px;
}

.btn-action {
    width: 36px;
    height: 36px;
    border-radius: 10px;
    border: none;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    text-decoration: none;
    transition: all 0.2s cubic-bezier(0.4, 0, 0.2, 1);
    background-color: #f1f5f9;
    font-size: 16px;
    box-shadow: 0 2px 4px rgba(0,0,0,0.02);
}

.btn-action:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 8px rgba(0,0,0,0.08);
}

.btn-action:active {
    transform: translateY(0);
}

.btn-view { color: #0284c7; }
.btn-view:hover { background-color: #e0f2fe; }

.btn-edit { color: #d97706; }
.btn-edit:hover { background-color: #fef3c7; }

.btn-delete { color: #dc2626; }
.btn-delete:hover { background-color: #fee2e2; }

@media (max-width: 768px) {
    .users-header {
        flex-direction: column;
        align-items: flex-start;
    }
    
    .users-actions {
        width: 100%;
    }
    
    .search-input {
        width: 100%;
    }
}
</style>