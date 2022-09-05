package com.example.fonta.piattaforma;

import android.content.Intent;
import android.os.Bundle;
import android.support.v7.app.AppCompatActivity;
import android.view.Menu;
import android.view.MenuInflater;
import android.view.MenuItem;
import android.view.View;

/**
 * Created by fonta on 22/04/2021.
 */

public class nonCertificato extends AppCompatActivity {



    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.nocertificato);



    }

    @Override
    public boolean onCreateOptionsMenu(Menu menu) {

        MenuInflater inflater = getMenuInflater();
        inflater.inflate(R.menu.menu, menu);
        return true;
    }

    @Override
    public boolean onOptionsItemSelected(MenuItem item) {
        switch (item.getItemId()) {
            case R.id.itemHome:
                Intent openHomePage = new Intent(nonCertificato.this, Homepage.class);
                startActivity(openHomePage);
                break;


            case R.id.logoutItem:
                Intent openMainPage = new Intent(nonCertificato.this, MainActivity.class);
                startActivity(openMainPage);
                break;

            case R.id.itemVaccini:
                Intent openVacciniPage=new Intent (nonCertificato.this, Vaccini.class);
                startActivity(openVacciniPage);
                break;

            case R.id.itemFakeNews:
                Intent openFakeNewsPage=new Intent (nonCertificato.this, FakeNews.class);
                startActivity(openFakeNewsPage);
                break;

            case R.id.itemCampagna:
                Intent openCampagnaPage=new Intent (nonCertificato.this, Campagna.class);
                startActivity(openCampagnaPage);
                break;

            case R.id.questionarioItem:
                Intent openQuestionarioPage=new Intent (nonCertificato.this, Questionario.class);
                startActivity(openQuestionarioPage);
                break;


        }
        return super.onOptionsItemSelected(item);
    }


    public void backHomePage(View v)
    {
        Intent openHomePage=new Intent(nonCertificato.this,Homepage.class);
        startActivity(openHomePage);
    }
}
