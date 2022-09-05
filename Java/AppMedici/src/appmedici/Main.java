/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package appmedici;

import java.awt.Color;
import java.awt.Container;
import java.awt.Dimension;
import java.awt.Toolkit;
import java.math.BigInteger;
import java.nio.charset.StandardCharsets;
import java.security.MessageDigest;
import java.security.NoSuchAlgorithmException;
import java.util.logging.Level;
import java.util.logging.Logger;
import javax.swing.JFrame;
import javax.swing.JOptionPane;
import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.Statement;

/**
 *
 * @author Fontana Emanuele
 */
public class Main extends javax.swing.JFrame {

    static boolean errore = false;
    public static Connection con;
    public static Statement st;
    public static ResultSet rs;
    public String pattern = "(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])(?=.*[@#$%^&!+=])(?=\\S+$).{8,}";
    public String regex = "^[A-Za-z0-9+_.-]+@(.+)$";
    public static String[] username = new String[100];
    String sesso, giorno, mese, anno;
    int index, m, g, a;
    static Dimension screenSize = Toolkit.getDefaultToolkit().getScreenSize();

    /**
     * Creates new form InserisciPasseggero
     */
    public Main() {
        initComponents();
        try {
            String sql = "SELECT `city_name` FROM `cities` ORDER BY `city_name`";
            st = con.createStatement();
            rs = st.executeQuery(sql);
            while (rs.next()) {
                cmbCom.addItem(rs.getString("city_name"));
            }
        } catch (SQLException ex) {
            Logger.getLogger(Main.class.getName()).log(Level.SEVERE, null, ex);
        }
        this.setTitle("Registrazione del medico");
        Container c = this.getContentPane();
        c.setBackground(Color.MAGENTA);
        this.setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
        int i;
        String s;
        for (i = 1; i < 32; i++) {
            s = String.valueOf(i);
            cmbgg.addItem(s);
        }
        for (i = 1; i < 13; i++) {
            s = String.valueOf(i);
            cmbme.addItem(s);
        }
        for (i = 1890; i <= 2021; i++) {
            s = String.valueOf(i);
            cmban.addItem(s);
        }
    }

    /**
     * This method is called from within the constructor to initialize the form.
     * WARNING: Do NOT modify this code. The content of this method is always
     * regenerated by the Form Editor.
     */
    
    // <editor-fold defaultstate="collapsed" desc="Generated Code">//GEN-BEGIN:initComponents
    private void initComponents() {

        cmban = new javax.swing.JComboBox<>();
        lblaan = new javax.swing.JLabel();
        lblmes = new javax.swing.JLabel();
        lblgg = new javax.swing.JLabel();
        cmbme = new javax.swing.JComboBox<>();
        cmbgg = new javax.swing.JComboBox<>();
        lblNome = new javax.swing.JLabel();
        txtNome = new javax.swing.JTextField();
        jLabel1 = new javax.swing.JLabel();
        txtCognome = new javax.swing.JTextField();
        lblComNas = new javax.swing.JLabel();
        cmbCom = new javax.swing.JComboBox<>();
        lblSes = new javax.swing.JLabel();
        ComboSes = new javax.swing.JComboBox<>();
        lblNM = new javax.swing.JLabel();
        txtNM = new javax.swing.JTextField();
        lblAvviso = new javax.swing.JLabel();
        lblEmail = new javax.swing.JLabel();
        txtEmail = new javax.swing.JTextField();
        lblTelefono = new javax.swing.JLabel();
        txtTel = new javax.swing.JTextField();
        lblPass = new javax.swing.JLabel();
        txtPass = new javax.swing.JTextField();
        txtConf = new javax.swing.JButton();
        btnRes = new javax.swing.JButton();
        lblAddPass = new javax.swing.JLabel();
        lblDataNa = new javax.swing.JLabel();

        setDefaultCloseOperation(javax.swing.WindowConstants.EXIT_ON_CLOSE);
        setMaximumSize(new java.awt.Dimension(600, 600));
        setPreferredSize(new java.awt.Dimension(1920, 1080));

        cmban.setBackground(new java.awt.Color(255, 153, 204));
        cmban.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                cmbanActionPerformed(evt);
            }
        });

        lblaan.setFont(new java.awt.Font("Arial Black", 1, 12)); // NOI18N
        lblaan.setText("Anno");

        lblmes.setFont(new java.awt.Font("Arial Black", 1, 12)); // NOI18N
        lblmes.setText("Mese");

        lblgg.setFont(new java.awt.Font("Arial Black", 1, 12)); // NOI18N
        lblgg.setText("Giorno");

        cmbme.setBackground(new java.awt.Color(255, 153, 204));
        cmbme.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                cmbmeActionPerformed(evt);
            }
        });

        cmbgg.setBackground(new java.awt.Color(255, 153, 204));
        cmbgg.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                cmbggActionPerformed(evt);
            }
        });

        lblNome.setFont(new java.awt.Font("Arial Black", 1, 18)); // NOI18N
        lblNome.setText("Nome");

        txtNome.setBackground(new java.awt.Color(255, 153, 204));
        txtNome.setFont(new java.awt.Font("Dialog", 1, 14)); // NOI18N
        txtNome.setBorder(javax.swing.BorderFactory.createBevelBorder(javax.swing.border.BevelBorder.RAISED));
        txtNome.addKeyListener(new java.awt.event.KeyAdapter() {
            public void keyPressed(java.awt.event.KeyEvent evt) {
                txtNomeKeyPressed(evt);
            }
        });

        jLabel1.setFont(new java.awt.Font("Arial Black", 1, 18)); // NOI18N
        jLabel1.setText("Cognome");

        txtCognome.setBackground(new java.awt.Color(255, 153, 204));
        txtCognome.setFont(new java.awt.Font("Dialog", 1, 14)); // NOI18N
        txtCognome.setBorder(javax.swing.BorderFactory.createBevelBorder(javax.swing.border.BevelBorder.RAISED));
        txtCognome.addKeyListener(new java.awt.event.KeyAdapter() {
            public void keyPressed(java.awt.event.KeyEvent evt) {
                txtCognomeKeyPressed(evt);
            }
        });

        lblComNas.setFont(new java.awt.Font("Arial Black", 1, 18)); // NOI18N
        lblComNas.setText("Comune di nascita");

        cmbCom.setBackground(new java.awt.Color(255, 153, 204));
        cmbCom.setForeground(new java.awt.Color(102, 255, 153));
        cmbCom.setBorder(javax.swing.BorderFactory.createBevelBorder(javax.swing.border.BevelBorder.RAISED));

        lblSes.setFont(new java.awt.Font("Arial Black", 1, 18)); // NOI18N
        lblSes.setText("Sesso");

        ComboSes.setBackground(new java.awt.Color(255, 153, 204));
        ComboSes.setModel(new javax.swing.DefaultComboBoxModel<>(new String[] { "Maschile", "Femminile" }));
        ComboSes.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                ComboSesActionPerformed(evt);
            }
        });

        lblNM.setFont(new java.awt.Font("Arial Black", 1, 18)); // NOI18N
        lblNM.setText("Numero di matricola");

        txtNM.setBackground(new java.awt.Color(255, 153, 204));
        txtNM.setFont(new java.awt.Font("Dialog", 1, 14)); // NOI18N
        txtNM.setBorder(javax.swing.BorderFactory.createBevelBorder(javax.swing.border.BevelBorder.RAISED));
        txtNM.addKeyListener(new java.awt.event.KeyAdapter() {
            public void keyPressed(java.awt.event.KeyEvent evt) {
                txtNMKeyPressed(evt);
            }
        });

        lblAvviso.setForeground(new java.awt.Color(255, 51, 51));
        lblAvviso.setText("* Verra usato come Username iniziale");

        lblEmail.setFont(new java.awt.Font("Arial Black", 1, 18)); // NOI18N
        lblEmail.setText("Email");

        txtEmail.setBackground(new java.awt.Color(255, 153, 204));
        txtEmail.setBorder(javax.swing.BorderFactory.createBevelBorder(javax.swing.border.BevelBorder.RAISED));

        lblTelefono.setFont(new java.awt.Font("Arial Black", 1, 18)); // NOI18N
        lblTelefono.setText("Telefono");

        txtTel.setBackground(new java.awt.Color(255, 153, 204));
        txtTel.setBorder(javax.swing.BorderFactory.createBevelBorder(javax.swing.border.BevelBorder.RAISED));
        txtTel.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                txtTelActionPerformed(evt);
            }
        });
        txtTel.addKeyListener(new java.awt.event.KeyAdapter() {
            public void keyPressed(java.awt.event.KeyEvent evt) {
                txtTelKeyPressed(evt);
            }
        });

        lblPass.setFont(new java.awt.Font("Arial Black", 1, 18)); // NOI18N
        lblPass.setText("Password");

        txtPass.setBackground(new java.awt.Color(255, 153, 204));
        txtPass.setBorder(javax.swing.BorderFactory.createBevelBorder(javax.swing.border.BevelBorder.RAISED));

        txtConf.setBackground(new java.awt.Color(255, 153, 204));
        txtConf.setFont(new java.awt.Font("Arial Black", 1, 20)); // NOI18N
        txtConf.setForeground(new java.awt.Color(255, 255, 255));
        txtConf.setText("Conferma");
        txtConf.setBorder(null);
        txtConf.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                txtConfActionPerformed(evt);
            }
        });

        btnRes.setBackground(new java.awt.Color(255, 153, 204));
        btnRes.setFont(new java.awt.Font("Arial Black", 1, 20)); // NOI18N
        btnRes.setForeground(new java.awt.Color(255, 255, 255));
        btnRes.setText("Svuota Campi");
        btnRes.setBorder(null);
        btnRes.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                btnResActionPerformed(evt);
            }
        });

        lblAddPass.setFont(new java.awt.Font("Comic Sans MS", 3, 28)); // NOI18N
        lblAddPass.setText("REGISTRA UN MEDICO");

        lblDataNa.setFont(new java.awt.Font("Arial Black", 1, 18)); // NOI18N
        lblDataNa.setText("Data di nascita");

        javax.swing.GroupLayout layout = new javax.swing.GroupLayout(getContentPane());
        getContentPane().setLayout(layout);
        layout.setHorizontalGroup(
            layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(layout.createSequentialGroup()
                .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                    .addGroup(layout.createSequentialGroup()
                        .addGap(73, 73, 73)
                        .addComponent(lblDataNa, javax.swing.GroupLayout.PREFERRED_SIZE, 170, javax.swing.GroupLayout.PREFERRED_SIZE))
                    .addGroup(layout.createSequentialGroup()
                        .addGap(15, 15, 15)
                        .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                            .addComponent(lblAvviso, javax.swing.GroupLayout.PREFERRED_SIZE, 230, javax.swing.GroupLayout.PREFERRED_SIZE)
                            .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                                .addGroup(javax.swing.GroupLayout.Alignment.TRAILING, layout.createSequentialGroup()
                                    .addComponent(cmbgg, javax.swing.GroupLayout.PREFERRED_SIZE, 70, javax.swing.GroupLayout.PREFERRED_SIZE)
                                    .addGap(18, 18, 18)
                                    .addComponent(cmbme, javax.swing.GroupLayout.PREFERRED_SIZE, 70, javax.swing.GroupLayout.PREFERRED_SIZE)
                                    .addGap(18, 18, 18)
                                    .addComponent(cmban, javax.swing.GroupLayout.PREFERRED_SIZE, 70, javax.swing.GroupLayout.PREFERRED_SIZE))
                                .addGroup(javax.swing.GroupLayout.Alignment.TRAILING, layout.createSequentialGroup()
                                    .addComponent(lblgg)
                                    .addGap(48, 48, 48)
                                    .addComponent(lblmes)
                                    .addGap(57, 57, 57)
                                    .addComponent(lblaan)
                                    .addGap(16, 16, 16))
                                .addComponent(cmbCom, javax.swing.GroupLayout.PREFERRED_SIZE, 260, javax.swing.GroupLayout.PREFERRED_SIZE)
                                .addComponent(txtNM, javax.swing.GroupLayout.Alignment.TRAILING, javax.swing.GroupLayout.PREFERRED_SIZE, 260, javax.swing.GroupLayout.PREFERRED_SIZE)
                                .addComponent(lblNM, javax.swing.GroupLayout.PREFERRED_SIZE, 210, javax.swing.GroupLayout.PREFERRED_SIZE)
                                .addComponent(lblNome)
                                .addComponent(txtNome, javax.swing.GroupLayout.PREFERRED_SIZE, 260, javax.swing.GroupLayout.PREFERRED_SIZE)
                                .addComponent(lblComNas))
                            .addComponent(txtTel, javax.swing.GroupLayout.PREFERRED_SIZE, 260, javax.swing.GroupLayout.PREFERRED_SIZE)
                            .addComponent(lblTelefono))))
                .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                    .addGroup(layout.createSequentialGroup()
                        .addGap(27, 27, 27)
                        .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.TRAILING)
                            .addComponent(txtEmail, javax.swing.GroupLayout.PREFERRED_SIZE, 260, javax.swing.GroupLayout.PREFERRED_SIZE)
                            .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                                .addComponent(txtCognome, javax.swing.GroupLayout.PREFERRED_SIZE, 260, javax.swing.GroupLayout.PREFERRED_SIZE)
                                .addComponent(jLabel1)
                                .addComponent(ComboSes, javax.swing.GroupLayout.PREFERRED_SIZE, 110, javax.swing.GroupLayout.PREFERRED_SIZE)
                                .addComponent(lblSes)))
                        .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED, 308, Short.MAX_VALUE)
                        .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                            .addComponent(txtConf, javax.swing.GroupLayout.Alignment.TRAILING, javax.swing.GroupLayout.PREFERRED_SIZE, 140, javax.swing.GroupLayout.PREFERRED_SIZE)
                            .addComponent(btnRes, javax.swing.GroupLayout.Alignment.TRAILING, javax.swing.GroupLayout.PREFERRED_SIZE, 180, javax.swing.GroupLayout.PREFERRED_SIZE))
                        .addGap(27, 27, 27))
                    .addGroup(layout.createSequentialGroup()
                        .addGap(18, 18, 18)
                        .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                            .addGroup(javax.swing.GroupLayout.Alignment.TRAILING, layout.createSequentialGroup()
                                .addGap(0, 0, Short.MAX_VALUE)
                                .addComponent(lblAddPass, javax.swing.GroupLayout.PREFERRED_SIZE, 357, javax.swing.GroupLayout.PREFERRED_SIZE))
                            .addGroup(layout.createSequentialGroup()
                                .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                                    .addComponent(txtPass, javax.swing.GroupLayout.PREFERRED_SIZE, 260, javax.swing.GroupLayout.PREFERRED_SIZE)
                                    .addComponent(lblPass)
                                    .addComponent(lblEmail, javax.swing.GroupLayout.PREFERRED_SIZE, 60, javax.swing.GroupLayout.PREFERRED_SIZE))
                                .addGap(0, 0, Short.MAX_VALUE)))
                        .addContainerGap())))
        );
        layout.setVerticalGroup(
            layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(layout.createSequentialGroup()
                .addGap(7, 7, 7)
                .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                    .addGroup(layout.createSequentialGroup()
                        .addComponent(lblDataNa)
                        .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.UNRELATED)
                        .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                            .addComponent(lblaan)
                            .addComponent(lblmes)
                            .addComponent(lblgg)))
                    .addComponent(lblAddPass))
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.UNRELATED)
                .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                    .addComponent(cmban, javax.swing.GroupLayout.PREFERRED_SIZE, 40, javax.swing.GroupLayout.PREFERRED_SIZE)
                    .addComponent(cmbme, javax.swing.GroupLayout.PREFERRED_SIZE, 40, javax.swing.GroupLayout.PREFERRED_SIZE)
                    .addComponent(cmbgg, javax.swing.GroupLayout.PREFERRED_SIZE, 40, javax.swing.GroupLayout.PREFERRED_SIZE))
                .addGap(18, 18, 18)
                .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.TRAILING)
                    .addGroup(layout.createSequentialGroup()
                        .addComponent(lblSes)
                        .addGap(46, 46, 46))
                    .addGroup(layout.createSequentialGroup()
                        .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                            .addGroup(javax.swing.GroupLayout.Alignment.TRAILING, layout.createSequentialGroup()
                                .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                                    .addGroup(layout.createSequentialGroup()
                                        .addComponent(lblNome)
                                        .addGap(18, 18, 18)
                                        .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                                            .addComponent(txtNome, javax.swing.GroupLayout.PREFERRED_SIZE, 40, javax.swing.GroupLayout.PREFERRED_SIZE)
                                            .addComponent(txtCognome, javax.swing.GroupLayout.PREFERRED_SIZE, 40, javax.swing.GroupLayout.PREFERRED_SIZE)))
                                    .addComponent(jLabel1))
                                .addGap(18, 18, 18))
                            .addGroup(layout.createSequentialGroup()
                                .addGap(13, 13, 13)
                                .addComponent(txtConf, javax.swing.GroupLayout.PREFERRED_SIZE, 70, javax.swing.GroupLayout.PREFERRED_SIZE)
                                .addGap(19, 19, 19)))
                        .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                            .addComponent(btnRes, javax.swing.GroupLayout.PREFERRED_SIZE, 70, javax.swing.GroupLayout.PREFERRED_SIZE)
                            .addGroup(layout.createSequentialGroup()
                                .addComponent(lblComNas)
                                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                                .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                                    .addComponent(cmbCom, javax.swing.GroupLayout.PREFERRED_SIZE, 40, javax.swing.GroupLayout.PREFERRED_SIZE)
                                    .addComponent(ComboSes, javax.swing.GroupLayout.PREFERRED_SIZE, 40, javax.swing.GroupLayout.PREFERRED_SIZE))))))
                .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.TRAILING)
                    .addGroup(layout.createSequentialGroup()
                        .addComponent(lblNM)
                        .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                        .addComponent(txtNM, javax.swing.GroupLayout.PREFERRED_SIZE, 40, javax.swing.GroupLayout.PREFERRED_SIZE))
                    .addGroup(layout.createSequentialGroup()
                        .addComponent(lblEmail, javax.swing.GroupLayout.PREFERRED_SIZE, 20, javax.swing.GroupLayout.PREFERRED_SIZE)
                        .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                        .addComponent(txtEmail, javax.swing.GroupLayout.PREFERRED_SIZE, 40, javax.swing.GroupLayout.PREFERRED_SIZE)))
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                .addComponent(lblAvviso, javax.swing.GroupLayout.PREFERRED_SIZE, 30, javax.swing.GroupLayout.PREFERRED_SIZE)
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                    .addGroup(layout.createSequentialGroup()
                        .addComponent(lblTelefono)
                        .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                        .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                            .addComponent(txtTel, javax.swing.GroupLayout.PREFERRED_SIZE, 40, javax.swing.GroupLayout.PREFERRED_SIZE)
                            .addComponent(txtPass, javax.swing.GroupLayout.PREFERRED_SIZE, 40, javax.swing.GroupLayout.PREFERRED_SIZE)))
                    .addComponent(lblPass))
                .addContainerGap(84, Short.MAX_VALUE))
        );

        pack();
    }// </editor-fold>//GEN-END:initComponents

    private void txtConfActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_txtConfActionPerformed
        // TODO add your handling code here:
        if (txtNome.getText().length() == 0 || txtCognome.getText().length() == 0 || txtNM.getText().length() == 0 || txtEmail.getText().length() == 0 || txtTel.getText().length() == 0 || txtPass.getText().length() == 0) {
            JOptionPane.showMessageDialog(null, "Ci sono campi incompleti", "Errore", JOptionPane.ERROR_MESSAGE);
        } else {

            String pass = txtPass.getText();
            if (!pass.matches(pattern)) {
                JOptionPane.showMessageDialog(null, "La password deve contere almeno 8 caratteri di cui almeno una lettera maiuscola, una minuscola, una cifra e un carattere speiclae (@#$%^&!+=)", "Errore", JOptionPane.ERROR_MESSAGE);
            } else {
                String[] DataNascita = new String[3];
                DataNascita[0] = giorno;
                DataNascita[1] = mese;
                DataNascita[2] = anno;
                String DN = DataNascita[2] + "-" + DataNascita[1] + "-" + DataNascita[0];
                String nome = txtNome.getText();
                String cognome = txtCognome.getText();
                int c = cmbCom.getSelectedIndex();
                String comune = cmbCom.getItemAt(c);
                int NM = Integer.parseInt(txtNM.getText());
                String tel = txtTel.getText();
                String email = txtEmail.getText();
                if (!email.matches(regex)) {
                    JOptionPane.showMessageDialog(null, "Formato email non valido", "Errore", JOptionPane.ERROR_MESSAGE);
                } else {
                    if (sesso == null) {
                        sesso = "Maschile";
                    }
                    MessageDigest md = null;
                    try {
                        md = MessageDigest.getInstance("SHA-256");
                    } catch (NoSuchAlgorithmException ex) {
                        Logger.getLogger(Main.class.getName()).log(Level.SEVERE, null, ex);
                    }

                    md.update(pass.getBytes(StandardCharsets.UTF_8));
                    byte[] digest = md.digest();
                    String cipherpassword = String.format("%064x", new BigInteger(1, digest));
                    try {
                        st = con.createStatement();
                        String sql = "INSERT INTO medici (Username, Nome, Cognome, Password, Email, NM, Telefono, Sesso, Comune, DataN) ";
                        sql += "VALUES ('" + NM + "','" + nome + "', '" + cognome + "', '" + cipherpassword + "', '" + email + "', '" + NM + "',  '" + tel + "',  '" + sesso + "',  '" + comune + "',    '" + DN + "')";
                        st.execute(sql);
                    } catch (SQLException ex) {
                        Logger.getLogger(Main.class.getName()).log(Level.SEVERE, null, ex);
                        System.out.println(ex);
                    }
                }
            }
        }
    }//GEN-LAST:event_txtConfActionPerformed

    private void txtTelKeyPressed(java.awt.event.KeyEvent evt) {//GEN-FIRST:event_txtTelKeyPressed
        // TODO add your handling code here:
        if (evt.getKeyChar() < 48 || evt.getKeyChar() > 57) {

            JOptionPane.showMessageDialog(null, "Inserire solo cifre numeriche", "Errore", JOptionPane.ERROR_MESSAGE);
            txtTel.setText(null);
        }
    }//GEN-LAST:event_txtTelKeyPressed

    private void txtTelActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_txtTelActionPerformed
        // TODO add your handling code here:
    }//GEN-LAST:event_txtTelActionPerformed

    private void cmbanActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_cmbanActionPerformed
        // TODO add your handling code here:
        a = cmban.getSelectedIndex();
        a += 1890;
        anno = String.valueOf(a);
        m = cmbme.getSelectedIndex();
        m++;
        mese = String.valueOf(m);
        g = cmbgg.getSelectedIndex();
        g++;
        giorno = String.valueOf(g);
        m = Integer.parseInt(mese);
        g = Integer.parseInt(giorno);
        if (m == 2) {
            if (g > 28) {
                JOptionPane.showMessageDialog(null, "DATA NON VALIDA ", "ERROERE", JOptionPane.ERROR_MESSAGE);
                cmbgg.setSelectedIndex(0);
                cmbme.setSelectedIndex(0);
            }
        }
        if (m == 4 || m == 6 || m == 9 || m == 11) {
            if (g > 30) {
                JOptionPane.showMessageDialog(null, "DATA NON VALIDA ", "ERROERE", JOptionPane.ERROR_MESSAGE);
                cmbgg.setSelectedIndex(0);
                cmbme.setSelectedIndex(0);
            }
        }
    }//GEN-LAST:event_cmbanActionPerformed

    private void txtCognomeKeyPressed(java.awt.event.KeyEvent evt) {//GEN-FIRST:event_txtCognomeKeyPressed
        // TODO add your handling code here:
        if (evt.getKeyChar() < 65 || evt.getKeyChar() > 90) {
            if (evt.getKeyChar() < 97) {
                if (evt.getKeyChar() != 8) {
                    txtCognome.grabFocus();
                    JOptionPane.showMessageDialog(null, "Inserire solo lettere", "Errore", JOptionPane.ERROR_MESSAGE);
                    txtCognome.setText(null);
                }
            }
        }
    }//GEN-LAST:event_txtCognomeKeyPressed

    private void cmbmeActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_cmbmeActionPerformed
        // TODO add your handling code here:
        a = cmban.getSelectedIndex();
        a += 1890;
        anno = String.valueOf(a);
        m = cmbme.getSelectedIndex();
        m++;
        mese = String.valueOf(m);
        g = cmbgg.getSelectedIndex();
        g++;
        giorno = String.valueOf(g);
        m = Integer.parseInt(mese);
        g = Integer.parseInt(giorno);
        if (m == 2) {
            if (g > 28) {
                JOptionPane.showMessageDialog(null, "DATA NON VALIDA ", "ERROERE", JOptionPane.ERROR_MESSAGE);
                cmbgg.setSelectedIndex(0);
                cmbme.setSelectedIndex(0);
            }
        }
        if (m == 4 || m == 6 || m == 9 || m == 11) {
            if (g > 30) {
                JOptionPane.showMessageDialog(null, "DATA NON VALIDA ", "ERROERE", JOptionPane.ERROR_MESSAGE);
                cmbgg.setSelectedIndex(0);
                cmbme.setSelectedIndex(0);
            }
        }
    }//GEN-LAST:event_cmbmeActionPerformed

    private void cmbggActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_cmbggActionPerformed
        // TODO add your handling code here:
        a = cmban.getSelectedIndex();
        a += 1890;
        anno = String.valueOf(a);
        m = cmbme.getSelectedIndex();
        m++;
        mese = String.valueOf(m);
        g = cmbgg.getSelectedIndex();
        g++;
        giorno = String.valueOf(g);
        m = Integer.parseInt(mese);
        g = Integer.parseInt(giorno);
        if (m == 2) {
            if (g > 28) {
                JOptionPane.showMessageDialog(null, "DATA NON VALIDA ", "ERROERE", JOptionPane.ERROR_MESSAGE);
                cmbgg.setSelectedIndex(0);
                cmbme.setSelectedIndex(0);
            }
        }
        if (m == 4 || m == 6 || m == 9 || m == 11) {
            if (g > 30) {
                JOptionPane.showMessageDialog(null, "DATA NON VALIDA ", "ERROERE", JOptionPane.ERROR_MESSAGE);
                cmbgg.setSelectedIndex(0);
                cmbme.setSelectedIndex(0);
            }
        }
    }//GEN-LAST:event_cmbggActionPerformed

    private void txtNomeKeyPressed(java.awt.event.KeyEvent evt) {//GEN-FIRST:event_txtNomeKeyPressed
        // TODO add your handling code here:
        if (evt.getKeyChar() < 65 || evt.getKeyChar() > 90) {
            if (evt.getKeyChar() < 97) {
                if (evt.getKeyChar() != 8) {
                    txtNome.grabFocus();
                    JOptionPane.showMessageDialog(null, "Inserire solo lettere", "Errore", JOptionPane.ERROR_MESSAGE);
                    txtNome.setText(null);
                }
            }
        }
    }//GEN-LAST:event_txtNomeKeyPressed

    private void ComboSesActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_ComboSesActionPerformed
        // TODO add your handling code here:
        int x = ComboSes.getSelectedIndex();
        if (x == 0) {
            sesso = "Maschile";
        }
        if (x == 1) {
            sesso = "Femminile";
        }
    }//GEN-LAST:event_ComboSesActionPerformed

    private void btnResActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_btnResActionPerformed
        // TODO add your handling code here:
        txtNome.setText(null);
        txtCognome.setText(null);
        txtEmail.setText(null);
        txtTel.setText(null);
        txtNM.setText(null);
    }//GEN-LAST:event_btnResActionPerformed

    private void txtNMKeyPressed(java.awt.event.KeyEvent evt) {//GEN-FIRST:event_txtNMKeyPressed
        // TODO add your handling code here:
        if (evt.getKeyChar() < 48 || evt.getKeyChar() > 57) {

            JOptionPane.showMessageDialog(null, "Inserire solo cifre numeriche", "Errore", JOptionPane.ERROR_MESSAGE);
            txtNM.setText(null);
        }
    }//GEN-LAST:event_txtNMKeyPressed

    /**
     * @param args the command line arguments
     */
    public static void main(String args[]) {
        /* Set the Nimbus look and feel */
        //<editor-fold defaultstate="collapsed" desc=" Look and feel setting code (optional) ">
        /* If Nimbus (introduced in Java SE 6) is not available, stay with the default look and feel.
         * For details see http://download.oracle.com/javase/tutorial/uiswing/lookandfeel/plaf.html 
         */
        try {
            for (javax.swing.UIManager.LookAndFeelInfo info : javax.swing.UIManager.getInstalledLookAndFeels()) {
                if ("Nimbus".equals(info.getName())) {
                    javax.swing.UIManager.setLookAndFeel(info.getClassName());
                    break;
                }
            }
        } catch (ClassNotFoundException ex) {
            java.util.logging.Logger.getLogger(Main.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        } catch (InstantiationException ex) {
            java.util.logging.Logger.getLogger(Main.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        } catch (IllegalAccessException ex) {
            java.util.logging.Logger.getLogger(Main.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        } catch (javax.swing.UnsupportedLookAndFeelException ex) {
            java.util.logging.Logger.getLogger(Main.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        }
        //</editor-fold>
        //</editor-fold>
        //</editor-fold>
        //</editor-fold>

        /* Create and display the form */
        java.awt.EventQueue.invokeLater(new Runnable() {
            public void run() {
                int i = 0;
                try {
                    con = DriverManager.getConnection("jdbc:mysql://localhost:3306/vaccini", "root", "");
                    st = con.createStatement();
                    rs = st.executeQuery("select Username from medici");
                    while (rs.next()) {
                        username[i] = rs.getString("Username");
                        i++;
                    }
                    st = con.createStatement();
                    rs = st.executeQuery("select Username from utenti");
                    while (rs.next()) {
                        username[i] = rs.getString("Username");
                        i++;
                    }
                    Main m = new Main();
                    m.setBounds(0, 0, screenSize.width, screenSize.height);
                m.setVisible(true);
                    m.setVisible(true);
                } catch (SQLException ex) {
                    JOptionPane.showMessageDialog(null, "Connessione al DBMS non riuscita", "Errore", JOptionPane.ERROR_MESSAGE);
                }

            }
        });
    }

    // Variables declaration - do not modify//GEN-BEGIN:variables
    private javax.swing.JComboBox<String> ComboSes;
    private javax.swing.JButton btnRes;
    private static javax.swing.JComboBox<String> cmbCom;
    private javax.swing.JComboBox<String> cmban;
    private javax.swing.JComboBox<String> cmbgg;
    private javax.swing.JComboBox<String> cmbme;
    private javax.swing.JLabel jLabel1;
    private javax.swing.JLabel lblAddPass;
    private javax.swing.JLabel lblAvviso;
    private javax.swing.JLabel lblComNas;
    private javax.swing.JLabel lblDataNa;
    private javax.swing.JLabel lblEmail;
    private javax.swing.JLabel lblNM;
    private javax.swing.JLabel lblNome;
    private javax.swing.JLabel lblPass;
    private javax.swing.JLabel lblSes;
    private javax.swing.JLabel lblTelefono;
    private javax.swing.JLabel lblaan;
    private javax.swing.JLabel lblgg;
    private javax.swing.JLabel lblmes;
    private javax.swing.JTextField txtCognome;
    private javax.swing.JButton txtConf;
    private javax.swing.JTextField txtEmail;
    private javax.swing.JTextField txtNM;
    private javax.swing.JTextField txtNome;
    private javax.swing.JTextField txtPass;
    private javax.swing.JTextField txtTel;
    // End of variables declaration//GEN-END:variables
}