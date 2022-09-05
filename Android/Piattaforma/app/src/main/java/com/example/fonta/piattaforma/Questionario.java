package com.example.fonta.piattaforma;

import android.content.Intent;
import android.graphics.Color;
import android.os.Bundle;
import android.support.v7.app.AppCompatActivity;
import android.view.Menu;
import android.view.MenuInflater;
import android.view.MenuItem;
import android.view.View;
import android.widget.RadioGroup;
import android.widget.TextView;
import android.widget.Toast;


/**
 * Created by fonta on 05/05/2021.
 */

public class Questionario extends AppCompatActivity {
    RadioGroup domanda1,domanda2,domanda3,domanda4,domanda5;
    TextView ris,quest1,quest2,quest3,quest4,quest5;
    public boolean onCreateOptionsMenu(Menu menu) {

        MenuInflater inflater = getMenuInflater();
        inflater.inflate(R.menu.menu, menu);
        return true;
    }

    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.questionario);
        domanda1=(RadioGroup) findViewById(R.id.domanda1Radio);
        domanda2=(RadioGroup) findViewById(R.id.domanda2Radio);
        domanda3=(RadioGroup) findViewById(R.id.domanda3Radio);
        domanda4=(RadioGroup) findViewById(R.id.domanda4Radio);
        domanda5=(RadioGroup) findViewById(R.id.domanda5Radio);
        ris=(TextView) findViewById(R.id.rispTextView);
        quest1=(TextView) findViewById(R.id.domanda1Text);
        quest2=(TextView) findViewById(R.id.domanda2Text);
        quest3=(TextView) findViewById(R.id.domanda3Text);
        quest4=(TextView) findViewById(R.id.domanda4Text);
        quest5=(TextView) findViewById(R.id.domanda5Text);



    }

    @Override
    public boolean onOptionsItemSelected(MenuItem item) {
        switch (item.getItemId()) {
            case R.id.itemHome:
                Intent openHomePage = new Intent(Questionario.this, Homepage.class);
                startActivity(openHomePage);
                break;

            case R.id.certificatoItem:
                if (AvailabilityResponse.stato.equals("1")) {
                    Intent openCertificatoPage = new Intent(Questionario.this, Certificato.class);
                    startActivity(openCertificatoPage);
                } else {
                    Intent openNonCertificatoPage = new Intent(Questionario.this, nonCertificato.class);
                    startActivity(openNonCertificatoPage);
                }
                break;

            case R.id.logoutItem:
                Intent openMainPage = new Intent(Questionario.this, MainActivity.class);
                startActivity(openMainPage);
                break;


            case R.id.itemFakeNews:
                Intent openFakeNewsPage=new Intent (Questionario.this, FakeNews.class);
                startActivity(openFakeNewsPage);
                break;

            case R.id.itemCampagna:
                Intent openCampagnaPage=new Intent (Questionario.this, Campagna.class);
                startActivity(openCampagnaPage);
                break;

            case R.id.itemVaccini:
                Intent openVacciniPage=new Intent (Questionario.this, Vaccini.class);
                startActivity(openVacciniPage);
                break;

        }
        return super.onOptionsItemSelected(item);
    }

    public void calcolaRis(View v)
    {

            int i=0;

            if (domanda1.getCheckedRadioButtonId()==R.id.answer1_1) {
                i++;
                quest1.setTextColor(Color.GREEN);
            }
            else quest1.setTextColor(Color.RED);

            if (domanda2.getCheckedRadioButtonId()==R.id.answer2_2) {
                quest2.setTextColor(Color.GREEN);
                i++;
            }
       else quest2.setTextColor(Color.RED);
            if (domanda3.getCheckedRadioButtonId()==R.id.answer3_1) {
                i++;
                quest3.setTextColor(Color.GREEN);
            }
            else quest3.setTextColor(Color.RED);
            if (domanda4.getCheckedRadioButtonId()==R.id.answer4_1) {
                i++;
                quest4.setTextColor(Color.GREEN);
            }
            else quest4.setTextColor(Color.RED);
            if (domanda5.getCheckedRadioButtonId()==R.id.answer5_2) {
                i++;
                quest5.setTextColor(Color.GREEN);
            }
       else quest5.setTextColor(Color.RED);
            String perc;
            if (i==0) perc="0%";
            perc=String.valueOf((i*100)/5)+"%";
            ris.setText(perc);
            }

            public void restart(View v)
            {
                Intent intent = getIntent();
                finish();
                startActivity(intent);
            }
        }

