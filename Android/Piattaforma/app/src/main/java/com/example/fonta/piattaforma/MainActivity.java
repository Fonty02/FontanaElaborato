package com.example.fonta.piattaforma;


import android.content.Intent;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.EditText;

import org.json.JSONObject;

import android.util.Log;

import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.JsonObjectRequest;


import org.json.JSONException;

public class MainActivity extends AppCompatActivity {
    EditText usernameEditText, passwordEditText;
    String url="http://192.168.1.99/FontanaElaborato/Android/androidLogin.php";


    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);
        usernameEditText = (EditText) findViewById(R.id.UsernameEditText);
        passwordEditText = (EditText) findViewById(R.id.passwordEditText);


    }


    public void Clear(View v) {
        usernameEditText.setText(null);
        passwordEditText.setText(null);
    }

    public void Login(View v) {
        if (usernameEditText.getText().toString().isEmpty()) {
            usernameEditText.setError("Bisogna inserire lo username");
        } else {
            if (passwordEditText.getText().toString().isEmpty()) {
                passwordEditText.setError("Bisogna inserire la password ");
            } else {
                String password = passwordEditText.getText().toString();
                String username = usernameEditText.getText().toString();
                JSONObject jsonObject = new JSONObject();
                try {
                    jsonObject.put("username", username);
                    jsonObject.put("password", password);
                    Log.i("mylog", jsonObject.getString("username"));
                } catch (JSONException e) {
                    e.printStackTrace();
                    return;
                }
                JsonObjectRequest jsonObjectRequest = new JsonObjectRequest(url, jsonObject,

                        new Response.Listener<JSONObject>() {
                            @Override
                            public void onResponse(JSONObject response) {
                                try {
                                    Log.i("mylog", response.getString("esistente"));
                                    if (response.getString("esistente").equals("0")) {
                                        Intent intent = new Intent(MainActivity.this, Failed.class);
                                        startActivity(intent);
                                    }
                                    else
                                    {
                                        AvailabilityResponse.stato=response.getString("Stato");
                                        Intent intent = new Intent(MainActivity.this, Homepage.class);
                                        startActivity(intent);
                                } }catch(JSONException e){
                                    Log.i("mylog", e.getMessage());
                                }
                            }
                        },
                        new Response.ErrorListener() {
                            @Override
                            public void onErrorResponse(VolleyError error) {
                                Log.i("mylog", error.getMessage());
                            }
                        }

                );
                MySingleton.getInstance(this).addToRequestQueue(jsonObjectRequest);
            }

        }
        }
    }
