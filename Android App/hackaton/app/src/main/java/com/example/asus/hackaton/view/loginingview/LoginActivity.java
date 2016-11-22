package com.example.asus.hackaton.view.loginingview;

import android.content.Intent;
import android.support.v7.app.AppCompatActivity;

import android.os.Bundle;
import android.view.View;
import android.view.View.OnClickListener;
import android.widget.Button;
import android.widget.EditText;

import com.example.asus.hackaton.R;
import com.example.asus.hackaton.presenter.presenterlogining.PresenterLogin;
import com.example.asus.hackaton.view.examview.ExamActivity;
import com.example.asus.hackaton.view.registrationview.RegistrationActivity;


public class LoginActivity extends AppCompatActivity {
    Button regitrationButton;
    Button connectButton;
    EditText loginEditText;
    EditText passwordEditText;
    private PresenterLogin presenterLogin;
    private String login;
    private String password;
    LoginActivity loginActivity;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_login);

        loginEditText = (EditText) findViewById(R.id.email_login_editText);
        passwordEditText = (EditText) findViewById(R.id.password_login_editText);



        regitrationButton = (Button) findViewById(R.id.register_button);
        connectButton = (Button) findViewById(R.id.connect_button);
        connectButton.setOnClickListener(new OnClickListener() {
            @Override
            public void onClick(View view) {
                login = loginEditText.getText().toString();
                password = passwordEditText.getText().toString();
                presenterLogin = new PresenterLogin(login,password,LoginActivity.this);
            }
        });






        regitrationButton.setOnClickListener(new OnClickListener() {
            @Override
            public void onClick(View view) {
                Intent intent = new Intent(LoginActivity.this, RegistrationActivity.class);
                startActivity(intent);
            }
        });
    }

}

