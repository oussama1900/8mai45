import java.io.DataInputStream;
import java.io.DataOutputStream;
import java.io.IOException;
import java.io.ObjectInputStream;
import java.io.ObjectOutputStream;
import java.lang.ClassNotFoundException;
import java.net.ServerSocket;
import java.net.Socket;

/**
 * This class implements java Socket server
 * @author pankaj
 *
 */
public class SocketServer {
    
  
    //socket server port on which it will listen
    private static int port = 9005;
    
    public static void main(String args[]) throws Exception{
    	ServerSocket connectToServer = new ServerSocket(port);
    	System.out.println("Server Created Successfully");
    	System.out.println("Waiting for Client...");
    	Socket accept = connectToServer.accept();
    	while(true) {
    		
    		
    		System.out.println("hello");
    		ObjectInputStream in = new ObjectInputStream(accept.getInputStream());
            ObjectOutputStream out = new ObjectOutputStream(accept.getOutputStream());
            System.out.println("hello2");
            Double[][] arrayAvg = new Double[2][2];
            arrayAvg = (Double [][])in.readObject();
            
            for (int i = 0; i < arrayAvg.length; i++) {
            	for (int j = 0; j < arrayAvg[i].length; j++) {
            		  System.out.println("value : "+arrayAvg[i][j]);
				}
				
			}
    		 
    		   
    		
    	}
        
    }
    
}


