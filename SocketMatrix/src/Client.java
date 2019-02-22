import java.io.ByteArrayInputStream;
import java.io.DataOutputStream;
import java.io.IOException;
import java.io.ObjectInputStream;
import java.io.ObjectOutputStream;
import java.net.InetAddress;
import java.net.Socket;
import java.net.UnknownHostException;
import java.util.Scanner;

/**
 * This class implements java socket client
 * @author pankaj
 *
 */
public class Client {
    private static int port = 9005;
    private static String Ip = "127.0.0.1";
    public static void main(String[] args) throws Exception{
    	Socket connectToServer = new Socket(Ip,port);
    	System.out.println("Connected");
    	Double[][] arrays = new Double[2][2];
        
        for(int i=0; i< 2; i++)
        {
            for(int j=0; j<2;j++)
            {
            	Scanner sc = new Scanner(System.in);
            	System.out.println("array["+i+"]["+j+"]=");
                arrays[i][j]=sc.nextDouble(); 
            }

        }
        for(int i=0; i< 2; i++)
        {
            for(int j=0; j<2;j++)
            {
            	 System.out.println("value : "+arrays[i][j]);
            }

        }
    	ObjectInputStream in = new ObjectInputStream(connectToServer.getInputStream());
        ObjectOutputStream out = new ObjectOutputStream(connectToServer.getOutputStream());
    	System.out.println("created client");
        
            out.writeObject(arrays);
    	
    		 
			
		
        
    }
}